<?php

namespace App\Livewire\Client;

use App\Models\SupportMessage;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SupportChat extends Component
{
    public $messages = [];
    public $newMessage = '';

    public function mount(): void
    {
        $this->loadMessages();
    }

    public function loadMessages(): void
    {
        $this->messages = SupportMessage::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get()
            ->map(fn ($m) => [
                'direction' => $m->direction,
                'message' => $m->message,
                'created_at' => $m->created_at?->format('H:i d.m.Y'),
            ])
            ->toArray();
    }

    public function send(TelegramService $telegram): void
    {
        $this->validate([
            'newMessage' => 'required|string|min:2',
        ]);

        $msg = SupportMessage::create([
            'user_id' => Auth::id(),
            'direction' => 'outbound',
            'message' => $this->newMessage,
        ]);

        $telegram->sendMessage("[Client #" . Auth::id() . "] " . $this->newMessage);

        $this->newMessage = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.client.support-chat');
    }
}
