<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component
{
    public int $produitId;
    public bool $estFavori = false;

    public function mount(int $produitId): void
    {
        $this->produitId = $produitId;
        $this->verifierFavori();
    }

    public function verifierFavori(): void
    {
        $favoris = session('favoris', []);
        $this->estFavori = in_array($this->produitId, $favoris);
    }

    public function toggle(): void
    {
        $favoris = session('favoris', []);

        if (in_array($this->produitId, $favoris)) {
            // Retirer des favoris
            $favoris = array_diff($favoris, [$this->produitId]);
            session(['favoris' => array_values($favoris)]);
            session()->flash('message', 'Retiré des favoris');
        } else {
            // Ajouter aux favoris
            $favoris[] = $this->produitId;
            session(['favoris' => $favoris]);
            session()->flash('message', 'Ajouté aux favoris ❤️');
        }

        $this->verifierFavori();
        $this->dispatch('favoris-modifie');
    }
};
?>

<div>
    <button type="button" 
            wire:click="toggle"
            class="w-10 h-10 rounded-full bg-white/95 backdrop-blur flex items-center justify-center transition shadow-sm hover:scale-110
                   {{ $estFavori ? 'text-nissa-rose' : 'text-gray-400 hover:text-nissa-rose' }}"
            title="{{ $estFavori ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
        <svg class="w-5 h-5" fill="{{ $estFavori ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
        </svg>
    </button>
</div>