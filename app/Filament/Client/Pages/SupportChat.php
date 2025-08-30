<?php

namespace App\Filament\Client\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class SupportChat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static string $view = 'filament.client.pages.support-chat';

    protected static ?string $navigationLabel = 'Support';

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();
        return $user && $user->verification_status === 'approved';
    }
}
