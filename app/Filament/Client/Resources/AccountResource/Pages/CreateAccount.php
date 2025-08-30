<?php

namespace App\Filament\Client\Resources\AccountResource\Pages;

use App\Filament\Client\Resources\AccountResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

class CreateAccount extends CreateRecord
{
    protected static string $resource = AccountResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Force ownership and initial defaults; client cannot set status/currency
        $data['user_id'] = Auth::id();
        $data['status'] = 'Pending';
        $data['currency'] = Auth::user()->currency ?? (config('currencies.default') ?? 'EUR');
        $data['is_default'] = $data['is_default'] ?? false;

        // Auto-generate unique invoice number (1..1,000,000), non-repeating
        if (empty($data['number'])) {
            $next = (int) DB::table('accounts')->selectRaw('MAX(CAST(number as INTEGER)) as max_num')->value('max_num');
            $candidate = max(1, $next + 1);
            if ($candidate > 1000000) {
                $candidate = 1;
            }
            $tries = 0;
            while (Account::where('number', (string) $candidate)->exists() && $tries < 1000001) {
                $candidate++;
                if ($candidate > 1000000) {
                    $candidate = 1;
                }
                $tries++;
            }
            $data['number'] = (string) $candidate;
        }
        return $data;
    }
}
