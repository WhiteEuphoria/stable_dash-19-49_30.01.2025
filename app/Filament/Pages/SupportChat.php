<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SupportChat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static string $view = 'filament.admin.pages.support-chat';

    protected static ?string $navigationLabel = 'Support Chat';
}

