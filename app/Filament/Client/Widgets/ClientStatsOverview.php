<?php
namespace App\Filament\Client\Widgets;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
class ClientStatsOverview extends BaseWidget
{
    public static function canView(): bool
    {
        $user = Auth::user();
        return $user && $user->verification_status === 'approved';
    }
    protected function getStats(): array
    {
        $user = Auth::user();
        $status = (string) ($user->verification_status ?? 'pending');
        $isApproved = $status === 'approved';
        $balance = is_numeric($user->main_balance ?? null) ? (float) $user->main_balance : 0.0;
        $currency = $user->currency ?: (config('currencies.default') ?? 'EUR');

        $stats = [];

        if ($isApproved) {
            $stats[] = Stat::make('Main Balance', number_format($balance, 2) . ' ' . $currency)
                ->description('Your current available funds')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success');

            $stats[] = Stat::make('Accounts', $user ? $user->accounts()->count() : 0)
                ->description('Total number of your accounts')
                ->color('info');
        }

        $stats[] = Stat::make('Verification Status', ucfirst($status))
            ->description('Your account status')
            ->color($isApproved ? 'success' : 'warning');

        return $stats;
    }
}
