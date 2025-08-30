<?php

namespace App\Livewire\Client;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CurrencySettings extends Component
{
    #[Validate('required|string|size:3')]
    public string $currency;

    public array $options = [];

    public function mount(): void
    {
        $this->options = config('currencies.allowed', ['EUR' => 'EUR']);
        $this->currency = Auth::user()->currency ?? (config('currencies.default') ?? 'EUR');
    }

    public function save(): void
    {
        $this->validate();

        $user = Auth::user();
        $allowed = array_keys($this->options);
        if (!in_array($this->currency, $allowed, true)) {
            $this->addError('currency', 'Unsupported currency selected.');
            return;
        }

        $user->currency = $this->currency;
        $user->save();

        // Propagate currency to all user's accounts for consistency
        $user->accounts()->update(['currency' => $this->currency]);

        Notification::make()->title('Currency updated')->success()->send();
    }

    public function render()
    {
        return view('livewire.client.currency-settings');
    }
}
