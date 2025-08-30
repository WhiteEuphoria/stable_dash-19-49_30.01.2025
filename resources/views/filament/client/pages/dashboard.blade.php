<x-filament-panels::page>
    <x-filament-widgets::widgets :widgets="$this->getWidgets()" />

    <div class="mt-6">
        <livewire:client.withdrawal-form />
    </div>
</x-filament-panels::page>
