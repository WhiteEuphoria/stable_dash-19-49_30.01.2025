<?php

namespace App\Livewire\Admin;

use App\Models\SupportMessage;
use App\Models\User;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SupportChat extends Component
{
    public ?int $selectedUserId = null;
    public array $threads = [];
    public $messages = [];

    #[Validate('required|string|min:1')]
    public string $reply = '';

    public function mount(): void
    {
        $this->loadThreads();
        if (!$this->selectedUserId && !empty($this->threads)) {
            $this->selectedUserId = (int) $this->threads[0]['user_id'];
        }
        $this->loadMessages();
    }

    public function loadThreads(): void
    {
        $rows = SupportMessage::query()
            ->select('user_id', DB::raw('MAX(created_at) as last_at'))
            ->groupBy('user_id')
            ->orderByDesc('last_at')
            ->get();

        $this->threads = $rows->map(function ($row) {
            $user = User::find($row->user_id);
            $formatted = null;
            if (!empty($row->last_at)) {
                try {
                    $formatted = Carbon::parse($row->last_at)->format('Y-m-d H:i');
                } catch (\Throwable $e) {
                    $formatted = (string) $row->last_at;
                }
            }
            return [
                'user_id' => $row->user_id,
                'name' => $user?->name ?? ('User #' . $row->user_id),
                'last_at' => $formatted,
            ];
        })->toArray();
    }

    public function selectThread(int $userId): void
    {
        $this->selectedUserId = $userId;
        $this->loadMessages();
    }

    public function loadMessages(): void
    {
        if (!$this->selectedUserId) {
            $this->messages = [];
            return;
        }
        $this->messages = SupportMessage::where('user_id', $this->selectedUserId)
            ->orderBy('created_at')
            ->get()
            ->map(function ($m) {
                return [
                    'direction' => $m->direction,
                    'message' => $m->message,
                    'created_at' => $m->created_at?->format('H:i d.m.Y'),
                    'user_name' => optional($m->user)->name,
                    'user_id' => $m->user_id,
                ];
            })
            ->toArray();
    }

    public function send(TelegramService $telegram): void
    {
        $this->validate();
        if (!$this->selectedUserId) {
            return;
        }

        SupportMessage::create([
            'user_id' => $this->selectedUserId,
            'direction' => 'inbound',
            'message' => $this->reply,
        ]);

        $telegram->sendMessage('[Admin → Client #' . $this->selectedUserId . '] ' . $this->reply);

        $this->reply = '';
        $this->loadMessages();
        $this->loadThreads();
    }

    public function render()
    {
        return view('livewire.admin.support-chat');
    }
}
