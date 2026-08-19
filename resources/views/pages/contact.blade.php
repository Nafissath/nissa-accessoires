@extends('layouts.principal')

@section('content')
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        
        <div class="text-center mb-12">
            <span class="inline-block text-xs uppercase tracking-[0.25em] text-nissa-rose font-semibold mb-2">
                Contactez-nous
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-nissa-choco mb-4" style="font-family: 'Playfair Display', serif;">
                Parlons de votre <span class="italic">projet</span>
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Une question sur nos créations ? Une demande spéciale ? Nous sommes là pour vous aider.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="text-center p-6 bg-gray-50 rounded-3xl">
                <div class="w-14 h-14 mx-auto mb-4 bg-nissa-rose/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-nissa-rose" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-nissa-choco mb-2">WhatsApp</h3>
                <a href="https://wa.me/2290191309710" class="text-nissa-rose hover:underline">+229 01 91 30 97 10</a>
            </div>

            <div class="text-center p-6 bg-gray-50 rounded-3xl">
                <div class="w-14 h-14 mx-auto mb-4 bg-nissa-rose/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-nissa-choco mb-2">Email</h3>
                <a href="mailto:nissa.accessoires@gmail.com" class="text-nissa-rose hover:underline">nissa.accessoires@gmail.com</a>
            </div>

            <div class="text-center p-6 bg-gray-50 rounded-3xl">
                <div class="w-14 h-14 mx-auto mb-4 bg-nissa-rose/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-nissa-choco mb-2">Adresse</h3>
                <p class="text-gray-600">Cotonou, Bénin</p>
            </div>
        </div>

        <div class="bg-nissa-rose/5 border border-nissa-rose/20 rounded-3xl p-8 text-center">
            <h2 class="text-2xl font-bold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
                Réponse rapide garantie
            </h2>
            <p class="text-gray-600 mb-6">
                Nous répondons à tous les messages dans les 24h, du lundi au samedi.
            </p>
            <a href="https://wa.me/2290191309710?text={{ urlencode('Bonjour Nissa Accessoires !') }}" 
               target="_blank"
               class="inline-flex items-center gap-2 bg-[#25D366] text-white px-8 py-4 rounded-2xl font-semibold hover:opacity-90 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                </svg>
                Nous écrire sur WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection