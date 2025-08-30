<?php

namespace App\Filament\Widgets;

use App\Models\Account;
use App\Models\User;
use App\Models\Withdrawal;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AccountWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', (string) User::count())
                ->description('Total registered users')
                ->color('info')
                ->icon('heroicon-m-users'),
            Stat::make('Accounts', (string) Account::count())
                ->description('All accounts')
                ->color('success')
                ->icon('heroicon-m-banknotes'),
            Stat::make('Pending withdrawals', (string) Withdrawal::where('status', 'pending')->count())
                ->description('Awaiting review')
                ->color('warning')
                ->icon('heroicon-m-clock'),
        ];
    }
}
