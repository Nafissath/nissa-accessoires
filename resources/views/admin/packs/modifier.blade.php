@extends('admin.layouts.admin')

@section('title', 'Modifier ' . $pack->nom)
@section('page-title', 'Modifier : ' . $pack->nom)

@section('content')

<div class="mb-8 flex items-center gap-4">
    <a href="{{ route('admin.packs.index') }}" class="text-gray-500 hover:text-nissa-rose transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
    </a>
    <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
        Modifier le pack
    </h1>
</div>

<form method="POST" action="{{ route('admin.packs.mettre-a-jour', $pack->id) }}" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-6">
    @csrf
    @method('PUT')

    {{-- Image actuelle --}}
    @if ($pack->image)
        <div>
            <label class="block text-sm font-medium text-nissa-choco mb-3">Image actuelle</label>
            <div class="relative inline-block">
                <div class="w-48 h-48 bg-gray-100 rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $pack->image) }}" alt="{{ $pack->nom }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-nissa-choco mb-2">Nom du pack <span class="text-nissa-rose">*</span></label>
            <input type="text" name="nom" value="{{ old('nom', $pack->nom) }}" required
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-nissa-choco mb-2">Description</label>
            <textarea name="description" rows="3"
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('description', $pack->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-nissa-choco mb-2">Prix de base (FCFA) <span class="text-nissa-rose">*</span></label>
            <input type="number" name="prix_base" value="{{ old('prix_base', $pack->prix_base) }}" required min="0"
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-nissa-choco mb-2">Prix promo (FCFA)</label>
            <input type="number" name="prix_promo" value="{{ old('prix_promo', $pack->prix_promo) }}" min="0"
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-nissa-choco mb-2">Changer l'image (optionnel)</label>
            <input type="file" name="image" accept="image/*"
                class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-nissa-rose/10 file:text-nissa-rose file:font-semibold hover:file:bg-nissa-rose/20">
        </div>

        <div class="md:col-span-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="actif" {{ old('actif', $pack->actif) ? 'checked' : '' }}
                    class="rounded border-gray-300 text-nissa-rose focus:ring-nissa-rose">
                <span class="text-sm text-nissa-choco">✅ Actif (visible sur la boutique)</span>
            </label>
        </div>
    </div>

    {{-- Sélection des produits --}}
    <div class="border-t border-gray-100 pt-6">
        <h2 class="text-lg font-semibold text-nissa-choco mb-4">🎁 Produits inclus dans le pack</h2>
        
        <div x-data="packBuilder({{ json_encode($pack->articles->map(fn($a) => ['produit_id' => $a->produit_id, 'quantite' => $a->quantite])) }})" class="space-y-4">
            <template x-for="(article, index) in articles" :key="index">
                <div class="flex gap-4 items-start bg-gray-50 p-4 rounded-xl">
                    <div class="flex-1">
                        <select :name="`articles[${index}][produit_id]`" x-model="article.produit_id" required class="w-full px-4 py-2 border border-gray-200 rounded-xl">
                            <option value="">-- Choisir un produit --</option>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}">{{ $produit->nom }} - {{ number_format($produit->prix_base, 0, ',', ' ') }} FCFA</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-32">
                        <input type="number" :name="`articles[${index}][quantite]`" x-model="article.quantite" min="1" required placeholder="Qté" class="w-full px-4 py-2 border border-gray-200 rounded-xl">
                    </div>
                    <button type="button" @click="removeArticle(index)" class="text-red-500 hover:text-red-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </template>

            <button type="button" @click="addArticle()" class="w-full py-3 border-2 border-dashed border-gray-300 rounded-xl text-gray-600 hover:border-nissa-rose hover:text-nissa-rose transition">
                + Ajouter un produit
            </button>
        </div>
    </div>

    <div class="flex gap-3 pt-6 border-t border-gray-100">
        <a href="{{ route('admin.packs.index') }}" class="px-6 py-3 border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition">Annuler</a>
        <button type="submit" class="px-6 py-3 bg-nissa-choco text-white rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg">
            Enregistrer les modifications
        </button>
    </div>
</form>

<script>
function packBuilder(initialArticles) {
    return {
        articles: initialArticles.length > 0 ? initialArticles : [{ produit_id: '', quantite: 1 }],
        
        addArticle() {
            this.articles.push({ produit_id: '', quantite: 1 });
        },
        
        removeArticle(index) {
            if (this.articles.length > 1) {
                this.articles.splice(index, 1);
            }
        }
    }
}
</script>

@endsection