@extends('admin.layouts.admin')

@section('title', 'Modifier ' . $produit->nom)

@section('content')

    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('admin.produits.index') }}" class="text-gray-500 hover:text-nissa-rose transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
            Modifier le produit
        </h1>
    </div>

    <form method="POST" action="{{ route('admin.produits.mettre-a-jour', $produit->id) }}" enctype="multipart/form-data"
        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-6">
        @csrf
        @method('PUT')

        {{-- Images existantes --}}
        @if ($produit->images->count() > 0)
            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-3">Photos actuelles</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    @foreach ($produit->images as $img)
                        <div class="relative group">
                            <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden">
                                <img src="{{ str_starts_with($img->chemin, 'http') ? $img->chemin : asset('storage/' . $img->chemin) }}"
                                    alt="" class="w-full h-full object-cover">
                            </div>
                            @if ($img->est_principale)
                                <span
                                    class="absolute top-2 left-2 bg-nissa-rose text-white text-xs px-2 py-1 rounded-full">⭐
                                    Principale</span>
                            @else
                                <form method="POST" action="{{ route('admin.images.principale', $img->id) }}"
                                    class="absolute top-2 left-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="bg-white/90 text-xs px-2 py-1 rounded-full hover:bg-white">⭐
                                        Principale</button>
                                </form>
                            @endif
                            <form method="POST" action="{{ route('admin.images.supprimer', $img->id) }}"
                                class="absolute top-2 right-2" onsubmit="return confirm('Supprimer cette image ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white w-7 h-7 rounded-full flex items-center justify-center hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Ajouter de nouvelles images --}}
        <div>
            <label class="block text-sm font-medium text-nissa-choco mb-2">Ajouter des photos</label>
            <input type="file" name="images[]" multiple accept="image/*"
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-nissa-rose/10 file:text-nissa-rose file:font-semibold hover:file:bg-nissa-rose/20">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Nom <span
                        class="text-nissa-rose">*</span></label>
                <input type="text" name="nom" value="{{ old('nom', $produit->nom) }}" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Catégorie <span
                        class="text-nissa-rose">*</span></label>
                <select name="categorie_id" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}"
                            {{ old('categorie_id', $produit->categorie_id) == $categorie->id ? 'selected' : '' }}>
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
                            {{ old('collection_id', $produit->collection_id) == $collection->id ? 'selected' : '' }}>
                            {{ $collection->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Prix de base (FCFA) <span
                        class="text-nissa-rose">*</span></label>
                <input type="number" name="prix_base" value="{{ old('prix_base', $produit->prix_base) }}" required
                    min="0"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Prix promo (FCFA)</label>
                <input type="number" name="prix_promo" value="{{ old('prix_promo', $produit->prix_promo) }}"
                    min="0"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Badge</label>
                <select name="badge"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    <option value="">-- Aucun --</option>
                    <option value="nouveau" {{ old('badge', $produit->badge) == 'nouveau' ? 'selected' : '' }}>🆕 Nouveau
                    </option>
                    <option value="promo" {{ old('badge', $produit->badge) == 'promo' ? 'selected' : '' }}>🏷️ Promo
                    </option>
                    <option value="bestseller" {{ old('badge', $produit->badge) == 'bestseller' ? 'selected' : '' }}>⭐
                        Bestseller</option>
                    <option value="pack" {{ old('badge', $produit->badge) == 'pack' ? 'selected' : '' }}>🎁 Pack</option>
                    <option value="exclusif" {{ old('badge', $produit->badge) == 'exclusif' ? 'selected' : '' }}>💎
                        Exclusif</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Description courte</label>
                <textarea name="description_courte" rows="2"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('description_courte', $produit->description_courte) }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Description longue</label>
                <textarea name="description_longue" rows="5"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('description_longue', $produit->description_longue) }}</textarea>
            </div>

            <div class="md:col-span-2 flex flex-wrap items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="est_actif" {{ old('est_actif', $produit->est_actif) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-nissa-rose">
                    <span class="text-sm text-nissa-choco"> Actif</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="est_en_avant"
                        {{ old('est_en_avant', $produit->est_en_avant ?? false) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-nissa-rose">
                    <span class="text-sm text-nissa-choco"> En avant</span>
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
                Enregistrer
            </button>
        </div>
    </form>

@endsection
