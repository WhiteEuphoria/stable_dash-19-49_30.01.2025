<?php

namespace App\Livewire\Client;

use App\Models\Withdrawal;
use Livewire\Component;

class WithdrawalForm extends Component
{
    public $amount;
    public $method = 'card';
    public $from_account_id;
    public $requisites; // will store JSON details
    public $successMessage;
    public $accounts = [];

    // Method-specific detail fields
    public $card_holder;
    public $card_number;
    public $card_expiry;

    public $beneficiary_name;
    public $iban;
    public $swift;
    public $bank_name;

    public $network;
    public $wallet_address;

    protected $rules = [
        'amount' => 'required|numeric|min:1',
        'method' => 'required|in:card,bank,crypto',
        'from_account_id' => 'nullable|integer',
    ];

    public function mount(): void
    {
        $this->accounts = auth()->user()->accounts()->get();
    }

    public function submit()
    {
        $this->validate();

        $selectedAccount = null;
        if ($this->from_account_id) {
            $selectedAccount = auth()->user()->accounts()->find($this->from_account_id);
            if (!$selectedAccount) {
                $this->addError('from_account_id', 'Invalid account selected.');
                return;
            }
        }

        $available = $selectedAccount ? (float) $selectedAccount->balance : (float) auth()->user()->main_balance;
        if ((float) $this->amount > $available) {
            $this->addError('amount', 'Insufficient funds.');
            return;
        }

        // Build details based on method
        $details = [];
        if ($this->method === 'card') {
            $this->validate([
                'card_holder' => 'required|string|min:3',
                'card_number' => 'required|string|min:12|max:19',
                'card_expiry' => 'nullable|string',
            ]);
            $details = [
                'card_holder' => $this->card_holder,
                'card_number' => $this->card_number,
                'card_expiry' => $this->card_expiry,
            ];
        } elseif ($this->method === 'bank') {
            $this->validate([
                'beneficiary_name' => 'required|string|min:3',
                'iban' => 'required|string|min:10',
                'swift' => 'nullable|string',
                'bank_name' => 'nullable|string',
            ]);
            $details = [
                'beneficiary_name' => $this->beneficiary_name,
                'iban' => $this->iban,
                'swift' => $this->swift,
                'bank_name' => $this->bank_name,
            ];
        } elseif ($this->method === 'crypto') {
            $this->validate([
                'network' => 'required|string|min:2',
                'wallet_address' => 'required|string|min:10',
            ]);
            $details = [
                'network' => $this->network,
                'wallet_address' => $this->wallet_address,
            ];
        }

        Withdrawal::create([
            'user_id' => auth()->id(),
            'amount' => $this->amount,
            'method' => $this->method,
            'from_account_id' => $this->from_account_id,
            'requisites' => json_encode($details, JSON_UNESCAPED_UNICODE),
            'status' => 'pending',
        ]);

        $this->reset([
            'amount', 'method', 'from_account_id', 'requisites',
            'card_holder', 'card_number', 'card_expiry',
            'beneficiary_name', 'iban', 'swift', 'bank_name',
            'network', 'wallet_address'
        ]);
        $this->method = 'card';
        $this->successMessage = 'Withdrawal request submitted successfully.';
    }

    public function render()
    {
        $displayCurrency = null;
        if ($this->from_account_id) {
            $acc = collect($this->accounts)->firstWhere('id', (int) $this->from_account_id);
            $displayCurrency = $acc['currency'] ?? $acc->currency ?? null;
        }
        $displayCurrency = $displayCurrency ?: (auth()->user()->currency ?? config('currencies.default'));

        return view('livewire.client.withdrawal-form', [
            'accounts' => $this->accounts,
            'displayCurrency' => $displayCurrency,
        ]);
    }
}
