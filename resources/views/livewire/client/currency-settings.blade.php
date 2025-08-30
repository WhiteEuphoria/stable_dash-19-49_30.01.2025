<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow max-w-xl">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Select Currency</h3>
    <div class="mt-4">
        <label for="currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Currency</label>
        <select id="currency" wire:model="currency" class="mt-1 block w-full rounded-md dark:bg-gray-900 dark:text-gray-300">
            @foreach($options as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>
        @error('currency') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
    </div>
    <div class="mt-4">
        <button wire:click="save" class="px-4 py-2 font-bold text-white rounded-md btn-amber">Save</button>
    </div>
</div>
