<?php

namespace App\Filament\Resources\WithdrawalResource\Pages;

use App\Filament\Resources\WithdrawalResource;
use App\Models\Account;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Exceptions\Halt;

class EditWithdrawal extends EditRecord
{
    protected static string $resource = WithdrawalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Soft-validate funds before approving, show a red validation error instead of exception
        $status = $data['status'] ?? null;
        $alreadyApplied = (bool) ($this->getRecord()->applied ?? false);

        if ($status === 'approved' && !$alreadyApplied) {
            $amount = (float) ($data['amount'] ?? 0);
            $userId = (int) ($data['user_id'] ?? $this->getRecord()->user_id);
            $fromAccountId = $data['from_account_id'] ?? $this->getRecord()->from_account_id;

            $available = null;

            if ($fromAccountId) {
                $acc = Account::find($fromAccountId);
                if (!$acc || $acc->user_id !== $userId) {
                    $this->addError('from_account_id', 'Selected source account is invalid for this user.');
                    Notification::make()->title('Invalid source account')->danger()->send();
                    throw new Halt();
                }
                $available = (float) $acc->balance;
            } else {
                $user = User::find($userId);
                $available = (float) ($user->main_balance ?? 0);
            }

            if ($amount > $available + 1e-6) {
                $this->addError('amount', 'Insufficient funds.');
                Notification::make()->title('Insufficient funds')->danger()->send();
                throw new Halt();
            }
        }

        // Merge structured bank details into requisites JSON for consistency
        $existing = [];
        if (!empty($this->getRecord()->requisites)) {
            $decoded = json_decode($this->getRecord()->requisites, true);
            if (is_array($decoded)) {
                $existing = $decoded;
            }
        }
        $payload = array_filter([
            'recipient_name' => $data['beneficiary_name'] ?? ($existing['recipient_name'] ?? null),
            'bank_name' => $data['bank_name'] ?? ($existing['bank_name'] ?? null),
            'swift' => $data['swift'] ?? ($existing['swift'] ?? null),
            'bank_account' => $data['bank_account'] ?? ($existing['bank_account'] ?? null),
        ], fn ($v) => $v !== null && $v !== '');

        if (!empty($payload)) {
            $data['requisites'] = json_encode($payload, JSON_UNESCAPED_UNICODE);
        }

        unset($data['beneficiary_name'], $data['bank_name'], $data['swift'], $data['bank_account']);

        return $data;
    }
}
