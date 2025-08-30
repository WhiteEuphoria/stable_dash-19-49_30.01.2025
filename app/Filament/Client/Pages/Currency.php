<?php

namespace App\Filament\Client\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Currency extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string $view = 'filament.client.pages.currency';

    protected static ?string $navigationLabel = 'Currency';

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();
        return $user && $user->verification_status === 'approved';
    }
}

