<?php

namespace App\Filament\Client\Resources\WithdrawalResource\Pages;

use App\Filament\Client\Resources\WithdrawalResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateWithdrawal extends CreateRecord
{
    protected static string $resource = WithdrawalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        $data['method'] = 'bank';
        // Pack bank details into requisites JSON
        $details = [
            'recipient_name' => $data['beneficiary_name'] ?? null,
            'bank_name' => $data['bank_name'] ?? null,
            'swift' => $data['swift'] ?? null,
            'bank_account' => $data['bank_account'] ?? null,
        ];
        $data['requisites'] = json_encode($details, JSON_UNESCAPED_UNICODE);
        unset($data['beneficiary_name'], $data['bank_name'], $data['swift'], $data['bank_account']);

        return $data;
    }
}
