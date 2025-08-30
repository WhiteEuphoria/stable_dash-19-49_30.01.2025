<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Withdrawal extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'amount', 'method', 'from_account_id', 'requisites', 'status', 'applied', 'applied_at',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'applied' => 'boolean',
            'applied_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function fromAccount(): BelongsTo { return $this->belongsTo(Account::class, 'from_account_id'); }

    protected static function booted(): void
    {
        static::updated(function (Withdrawal $w): void {
            // Apply deduction exactly once when approved
            if ($w->status !== 'approved' || $w->applied) {
                return;
            }

            DB::transaction(function () use ($w) {
                // Refresh fresh values within transaction
                $w->refresh();
                if ($w->applied) {
                    return; // already applied in another process
                }

                $amount = (float) $w->amount;
                if ($amount <= 0) {
                    throw new \RuntimeException('Invalid withdrawal amount.');
                }

                if ($w->from_account_id) {
                    $account = Account::lockForUpdate()->find($w->from_account_id);
                    if (!$account || $account->user_id !== $w->user_id) {
                        throw new \RuntimeException('Invalid source account.');
                    }
                    $available = (float) $account->balance;
                    if ($amount > $available + 1e-6) {
                        throw new \RuntimeException('Insufficient account balance to approve this withdrawal.');
                    }
                    $account->balance = round($available - $amount, 2);
                    $account->save();
                } else {
                    $user = User::lockForUpdate()->find($w->user_id);
                    $available = (float) $user->main_balance;
                    if ($amount > $available + 1e-6) {
                        throw new \RuntimeException('Insufficient main balance to approve this withdrawal.');
                    }
                    $user->main_balance = round($available - $amount, 2);
                    $user->save();
                }

                $w->applied = true;
                $w->applied_at = Carbon::now();
                $w->save();
            });
        });
    }
}
