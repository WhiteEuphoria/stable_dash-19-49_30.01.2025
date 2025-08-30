<?php

namespace App\Filament\Client\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Verification extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.client.pages.verification';

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();
        // Show in navigation only until approved
        return $user && ($user->verification_status !== 'approved');
    }
}
