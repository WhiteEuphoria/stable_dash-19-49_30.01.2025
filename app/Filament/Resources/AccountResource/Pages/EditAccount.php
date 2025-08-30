<?php

namespace App\Filament\Resources\AccountResource\Pages;

use App\Filament\Resources\AccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccount extends EditRecord
{
    protected static string $resource = AccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        // Ensure only one default account per user
        $record = $this->getRecord();
        if ($record && $record->is_default) {
            $record->newQuery()
                ->where('user_id', $record->user_id)
                ->where('id', '!=', $record->id)
                ->update(['is_default' => false]);
        }
    }
}
