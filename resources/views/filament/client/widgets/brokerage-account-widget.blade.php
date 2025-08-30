<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Brokerage Account
        </x-slot>

        @if ($account)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Account Name</div>
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $account->name }}</div>
                </div>
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Account Number</div>
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $account->number }}</div>
                </div>
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Custodian Bank</div>
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $account->bank }}</div>
                </div>
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Balance</div>
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ $account->currency ?? 'EUR' }} {{ number_format($account->balance, 2) }}</div>
                </div>
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">You have no brokerage accounts yet.</p>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>

