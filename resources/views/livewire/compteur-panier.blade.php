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

    #[On('panier-modifie')]
    public function rafraichir(): void
    {
        $panier = session('panier', []);
        $this->nombre = 0;
        foreach ($panier as $article) {
            $this->nombre += $article['quantite'];
        }
    }
};
?>

<a href="{{ route('panier.index') }}" class="relative p-2 hover:bg-nissa-cream rounded-full transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
    </svg>
    @if($nombre > 0)
        <span class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-nissa-rose rounded-full">
            {{ $nombre }}
        </span>
    @endif
</a>