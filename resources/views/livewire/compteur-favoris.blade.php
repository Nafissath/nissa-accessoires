<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component
{
    public int $nombre = 0;

    public function mount(): void
    {
        $this->rafraichir();
    }

    #[On('favoris-modifie')]
    public function rafraichir(): void
    {
        $this->nombre = count(session('favoris', []));
    }
};
?>

<a href="{{ route('favoris.index') }}" class="relative p-2 hover:bg-nissa-cream rounded-full transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
    </svg>
    @if($nombre > 0)
        <span class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-nissa-rose rounded-full">
            {{ $nombre }}
        </span>
    @endif
</a>