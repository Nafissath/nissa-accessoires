@extends('admin.layouts.admin')

@section('title', 'Nouveau produit')

@section('content')

    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('admin.produits.index') }}" class="text-gray-500 hover:text-nissa-rose transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
            Nouveau produit
        </h1>
    </div>

    <form method="POST" action="{{ route('admin.produits.enregistrer') }}" enctype="multipart/form-data"
        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-6">
        @csrf

        {{-- Images --}}
        <div>
            <label class="block text-sm font-medium text-nissa-choco mb-2">Photos du produit <span
                    class="text-nissa-rose">*</span></label>
            <p class="text-xs text-gray-500 mb-3">La première image sera affichée comme photo principale. Vous pouvez en
                ajouter plusieurs.</p>
            <input type="file" name="images[]" multiple accept="image/*" required
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-nissa-rose/10 file:text-nissa-rose file:font-semibold hover:file:bg-nissa-rose/20">
            <p class="text-xs text-gray-400 mt-2">Formats : JPG, PNG, WebP. Max 5 Mo par image.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Nom du produit <span
                        class="text-nissa-rose">*</span></label>
                <input type="text" name="nom" value="{{ old('nom') }}" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Catégorie <span
                        class="text-nissa-rose">*</span></label>
                <select name="categorie_id" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    <option value="">-- Choisir --</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Collection</label>
                <select name="collection_id"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    <option value="">-- Aucune --</option>
                    @foreach ($collections as $collection)
                        <option value="{{ $collection->id }}"
                            {{ old('collection_id') == $collection->id ? 'selected' : '' }}>
                            {{ $collection->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Prix de base (FCFA) <span
                        class="text-nissa-rose">*</span></label>
                <input type="number" name="prix_base" value="{{ old('prix_base') }}" required min="0"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Prix promo (FCFA)</label>
                <input type="number" name="prix_promo" value="{{ old('prix_promo') }}" min="0"
                    placeholder="Laisser vide si pas de promo"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Badge</label>
                <select name="badge"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    <option value="">-- Aucun --</option>
                    <option value="nouveau" {{ old('badge') == 'nouveau' ? 'selected' : '' }}>🆕 Nouveau</option>
                    <option value="promo" {{ old('badge') == 'promo' ? 'selected' : '' }}>🏷️ Promo</option>
                    <option value="bestseller" {{ old('badge') == 'bestseller' ? 'selected' : '' }}>⭐ Bestseller</option>
                    <option value="pack" {{ old('badge') == 'pack' ? 'selected' : '' }}>🎁 Pack</option>
                    <option value="exclusif" {{ old('badge') == 'exclusif' ? 'selected' : '' }}>💎 Exclusif</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Description courte</label>
                <textarea name="description_courte" rows="2" placeholder="Apparaît sur la fiche produit"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('description_courte') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Description longue</label>
                <textarea name="description_longue" rows="5" placeholder="Description détaillée du produit"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('description_longue') }}</textarea>
            </div>

            <div class="md:col-span-2 flex flex-wrap items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="est_actif" {{ old('est_actif', true) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-nissa-rose">
                    <span class="text-sm text-nissa-choco">✅ Actif (visible sur la boutique)</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="est_en_avant" {{ old('est_en_avant') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-nissa-rose">
                    <span class="text-sm text-nissa-choco"> En avant (page d'accueil)</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.produits.index') }}"
                class="px-6 py-3 border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition">
                Annuler
            </a>
            <button type="submit"
                class="px-6 py-3 bg-nissa-choco text-white rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg">
                Créer le produit
            </button>
        </div>
    </form>

@endsection
