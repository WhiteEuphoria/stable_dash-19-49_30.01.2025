<?php

namespace App\Filament\Client\Widgets;

use App\Models\Account;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class BrokerageAccountWidget extends Widget
{
    protected static string $view = 'filament.client.widgets.brokerage-account-widget';

    public ?Account $account = null;

    public function mount(): void
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Prefer default ACTIVE brokerage account if set
            $this->account = $user->accounts()
                ->whereIn('type', ['Брокерский', 'Brokerage'])
                ->where('status', 'Active')
                ->where('is_default', true)
                ->first();

            if (!$this->account) {
                // Fallback to most recent ACTIVE brokerage account
                $this->account = $user->accounts()
                    ->whereIn('type', ['Брокерский', 'Brokerage'])
                    ->where('status', 'Active')
                    ->orderByDesc('id')
                    ->first();
            }
        }
    }
}
