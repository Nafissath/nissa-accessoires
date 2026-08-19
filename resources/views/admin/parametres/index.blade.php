@extends('admin.layouts.admin')

@section('title', 'Paramètres')
@section('page-title', 'Paramètres du site')

@section('content')

<form method="POST" action="{{ route('admin.parametres.update') }}" class="max-w-3xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-5">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium text-nissa-choco mb-2">Numéro WhatsApp (avec indicatif, sans +)</label>
        <input type="text" name="whatsapp" value="{{ $parametres['whatsapp'] ?? '' }}"
            class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose">
    </div>

    <div>
        <label class="block text-sm font-medium text-nissa-choco mb-2">Email de contact</label>
        <input type="email" name="email" value="{{ $parametres['email'] ?? '' }}"
            class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose">
    </div>

    <div>
        <label class="block text-sm font-medium text-nissa-choco mb-2">Adresse</label>
        <input type="text" name="adresse" value="{{ $parametres['adresse'] ?? '' }}"
            class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-nissa-choco mb-2">Lien TikTok</label>
            <input type="url" name="tiktok" value="{{ $parametres['tiktok'] ?? '' }}"
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose">
        </div>
        <div>
            <label class="block text-sm font-medium text-nissa-choco mb-2">Lien Instagram</label>
            <input type="url" name="instagram" value="{{ $parametres['instagram'] ?? '' }}"
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-nissa-choco mb-2">Texte livraison</label>
        <textarea name="texte_livraison" rows="2"
            class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose">{{ $parametres['texte_livraison'] ?? '' }}</textarea>
    </div>

    <button type="submit" class="px-6 py-3 bg-nissa-choco text-white rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg">
        Enregistrer les paramètres
    </button>
</form>

@endsection