<?php

namespace App\Filament\Client\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class TransitAccountWidget extends Widget
{
    protected static string $view = 'filament.client.widgets.transit-account-widget';
    protected int|string|array $columnSpan = 'full';

    public ?Collection $invoiceAccounts = null;

    public static function canView(): bool
    {
        $user = Auth::user();
        return $user && $user->verification_status === 'approved';
    }

    public function mount(): void
    {
        if (Auth::check()) {
            // Show all user's invoices (all account records they own)
            $this->invoiceAccounts = Auth::user()->accounts()
                ->orderByDesc('is_default')
                ->orderByDesc('id')
                ->get();
        }
    }
}
