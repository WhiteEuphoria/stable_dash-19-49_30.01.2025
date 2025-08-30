<div class="p-6 mt-4 bg-white dark:bg-gray-800 rounded-lg shadow">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Request Withdrawal</h3>
    <form wire:submit.prevent="submit" class="mt-4 space-y-4">
        @if ($successMessage)
            <div class="p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ $successMessage }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="method" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Method</label>
                <select id="method" wire:model="method" class="block w-full mt-1 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <option value="card">Card</option>
                    <option value="bank">Bank Account</option>
                    <option value="crypto">Crypto</option>
                </select>
                @error('method') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="from_account_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">From Account</label>
                <select id="from_account_id" wire:model="from_account_id" class="block w-full mt-1 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <option value="">— Main Balance —</option>
                    @foreach ($accounts as $acc)
                        <option value="{{ $acc->id }}">{{ $acc->name ?? 'Account' }} ({{ $acc->type }}) — {{ $acc->currency ?? 'EUR' }} {{ number_format($acc->balance, 2) }}</option>
                    @endforeach
                </select>
                @error('from_account_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount ({{ $displayCurrency }})</label>
                <input type="number" step="0.01" id="amount" wire:model="amount" class="block w-full mt-1 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" placeholder="0.00">
                @error('amount') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Method-specific fields -->
        <div x-data="{ method: @entangle('method') }" class="space-y-4">
            <!-- Card -->
            <div x-show="method === 'card'">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Card details</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-1">
                    <input type="text" placeholder="Card holder" wire:model="card_holder" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <input type="text" placeholder="Card number" wire:model="card_number" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <input type="text" placeholder="MM/YY (optional)" wire:model="card_expiry" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                </div>
                @error('card_holder') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                @error('card_number') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Bank -->
            <div x-show="method === 'bank'">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bank details</label>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-1">
                    <input type="text" placeholder="Beneficiary name" wire:model="beneficiary_name" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <input type="text" placeholder="IBAN / Account" wire:model="iban" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <input type="text" placeholder="SWIFT (optional)" wire:model="swift" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <input type="text" placeholder="Bank name (optional)" wire:model="bank_name" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                </div>
                @error('beneficiary_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                @error('iban') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Crypto -->
            <div x-show="method === 'crypto'">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Crypto details</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-1">
                    <input type="text" placeholder="Network (e.g. TRC20)" wire:model="network" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                    <input type="text" placeholder="Wallet address" wire:model="wallet_address" class="block w-full dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                </div>
                @error('network') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                @error('wallet_address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="px-4 py-2 font-bold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
            Submit Request
        </button>
    </form>
</div>
