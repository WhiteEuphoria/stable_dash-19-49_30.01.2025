<div class="p-6 chat-box rounded-lg shadow h-96 flex flex-col"
     wire:poll.5s="loadMessages"
     x-data="{ scroll(){ this.$nextTick(() => { const el = $refs.list; if (el) { el.scrollTop = el.scrollHeight } }) }, init(){ this.scroll(); this.$watch('$wire.messages', () => this.scroll()); } }">
    <h3 class="text-lg font-semibold text-heading mb-2">Support Chat</h3>
    <div class="flex-1 overflow-y-auto space-y-2 pr-2 relative" x-ref="list" @scroll="atBottom = ($refs.list.scrollTop + $refs.list.clientHeight) >= ($refs.list.scrollHeight - 4)">
        @foreach ($messages as $m)
            @php($isYou = (($m['direction'] ?? 'outbound') === 'outbound'))
            <div class="flex justify-start transition-opacity duration-200 ease-out" x-data x-init="$el.classList.add('opacity-0','translate-y-1'); setTimeout(()=>{$el.classList.remove('opacity-0','translate-y-1')}, 0)">
                <div class="chat-bubble px-3 py-2 rounded-lg {{ $isYou ? 'chat-bubble-out' : 'chat-bubble-in' }}">
                    <div class="flex items-baseline justify-between gap-2 mb-1">
                        <div class="chat-meta-left">{{ $isYou ? 'You' : 'Admin' }}</div>
                        <div class="chat-meta-right">{{ $m['created_at'] ?? '' }}</div>
                    </div>
                    <div>{{ $m['message'] ?? '' }}</div>
                </div>
            </div>
        @endforeach

        <button x-show="!atBottom" @click="scroll()" class="hidden md:flex items-center gap-1 px-2 py-1 rounded-full bg-indigo-600 text-white text-xs shadow absolute bottom-2 right-2" x-transition.opacity>
            New
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M2.25 12a.75.75 0 0 1 .75-.75h15.19l-5.22-5.22a.75.75 0 1 1 1.06-1.06l6.5 6.5a.75.75 0 0 1 0 1.06l-6.5 6.5a.75.75 0 1 1-1.06-1.06l5.22-5.22H3a.75.75 0 0 1-.75-.75z" clip-rule="evenodd" />
            </svg>
        </button>
        @if (count($messages) === 0)
            <div class="chat-empty">No messages yet. Ask us anything!</div>
        @endif
    </div>
    <form wire:submit.prevent="send" class="mt-3 flex gap-2 items-center" @submit.prevent="scroll()">
        <input type="text" wire:model.defer="newMessage" class="chat-input flex-1 rounded-md bg-white text-black border border-gray-300 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 focus:text-black" placeholder="Write a message...">
        <button type="submit" aria-label="Send" class="p-2 rounded-full bg-indigo-600 hover:bg-indigo-700 text-white shadow">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M2.25 12a.75.75 0 0 1 .75-.75h15.19l-5.22-5.22a.75.75 0 1 1 1.06-1.06l6.5 6.5a.75.75 0 0 1 0 1.06l-6.5 6.5a.75.75 0 1 1-1.06-1.06l5.22-5.22H3a.75.75 0 0 1-.75-.75z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>
</div>
