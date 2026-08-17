@extends('layouts.principal')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="mb-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
            Mon <span class="italic text-nissa-rose">Panier</span>
        </h1>
    </div>

    <livewire:panier />
</div>

@endsection