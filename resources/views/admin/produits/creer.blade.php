@extends('admin.layouts.admin')

@section('title', 'Nouveau produit')
@section('page-title', 'Nouveau produit')

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

{{-- ✅ AFFICHAGE DES ERREURS --}}
@if ($errors->any())
    <div class="bg-red-50 border-2 border-red-300 rounded-2xl p-4 mb-6">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <div>
                <p class="font-semibold text-red-800 mb-2">Erreurs de validation :</p>
                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<form method="POST" action="{{ route('admin.produits.enregistrer') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- INFOS PRODUIT --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <h2 class="text-lg font-semibold text-nissa-choco mb-4" style="font-family: 'Playfair Display', serif;">
            📝 Informations du produit
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Photos du produit <span class="text-nissa-rose">*</span></label>
                <input type="file" name="images[]" multiple accept="image/*" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-nissa-rose/10 file:text-nissa-rose file:font-semibold hover:file:bg-nissa-rose/20">
                <p class="text-xs text-gray-400 mt-2">La première sera la photo principale. Max 5 Mo.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Nom du produit <span class="text-nissa-rose">*</span></label>
                <input type="text" name="nom" value="{{ old('nom') }}" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Catégorie <span class="text-nissa-rose">*</span></label>
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
                        <option value="{{ $collection->id }}" {{ old('collection_id') == $collection->id ? 'selected' : '' }}>
                            {{ $collection->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Prix de base (FCFA) <span class="text-nissa-rose">*</span></label>
                <input type="number" name="prix_base" value="{{ old('prix_base') }}" required min="0"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                <p class="text-xs text-gray-400 mt-1">💡 Sera automatiquement mis à jour avec le prix min des variantes</p>
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
                    <option value="exclusif" {{ old('badge') == 'exclusif' ? 'selected' : '' }}>💎 Exclusif</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">🎨 Nuances / Couleurs</label>
                <input type="text" name="nuances_couleurs" value="{{ old('nuances_couleurs') }}" 
                    placeholder="Ex: Rose poudré & Or"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                <p class="text-xs text-gray-400 mt-1">Si le produit a plusieurs couleurs dans son design</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Description courte</label>
                <textarea name="description_courte" rows="2" placeholder="Apparaît sur la fiche produit"
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('description_courte') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-nissa-choco mb-2">Description longue</label>
                <textarea name="description_longue" rows="5" placeholder="Description détaillée"
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
                    <span class="text-sm text-nissa-choco">⭐ En avant (page d'accueil)</span>
                </label>
            </div>
        </div>
    </div>

    {{-- CONSTRUCTEUR DE VARIANTES --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8" x-data="variantesBuilder()">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                🎨 Variantes (couleurs, tailles, matières)
            </h2>
            <span class="text-sm text-gray-500" x-text="variantes.length + ' variante(s)'"></span>
        </div>
        <p class="text-sm text-gray-500 mb-6">
            💡 <strong>Astuce :</strong> Pour un produit bicolore (ex: Rose & Or), ajoutez plusieurs couleurs à la même variante !
        </p>

        <div class="space-y-4 mb-6">
            <template x-for="(variante, vIndex) in variantes" :key="vIndex">
                <div class="bg-nissa-cream rounded-2xl p-5 border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2">
                                <template x-for="(c, cIndex) in variante.couleurs" :key="cIndex">
                                    <div class="w-8 h-8 rounded-full border-2 border-white shadow-sm"
                                        :style="'background-color: ' + c.hex"
                                        :title="c.nom || 'Couleur ' + (cIndex + 1)">
                                    </div>
                                </template>
                            </div>
                            <span class="font-semibold text-nissa-choco text-sm"
                                x-text="variante.couleurs.map(c => c.nom).filter(n => n).join(' & ') || 'Variante ' + (vIndex + 1)"></span>
                        </div>
                        <button type="button" @click="removeVariante(vIndex)" x-show="variantes.length > 1"
                            class="text-red-500 hover:text-red-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>

                    {{-- Couleurs --}}
                    <div class="mb-4">
                        <label class="block text-xs font-medium text-nissa-choco mb-2">
                            Couleurs
                            <span class="text-gray-400 font-normal">(ajoutez-en plusieurs pour un produit bicolore)</span>
                        </label>
                        <div class="space-y-2">
                            <template x-for="(couleur, cIndex) in variante.couleurs" :key="cIndex">
                                <div class="flex gap-2 items-center">
                                    <span class="text-xs text-gray-500 w-20"
                                        x-text="cIndex === 0 ? 'Principale' : 'Secondaire ' + cIndex"></span>
                                    <input type="color" x-model="couleur.hex"
                                        class="w-10 h-9 rounded-lg border border-gray-200 cursor-pointer p-1">
                                    <input type="text"
                                        :name="`variantes[${vIndex}][couleurs][${cIndex}][nom]`"
                                        x-model="couleur.nom"
                                        placeholder="Nom (ex: Rose poudré)"
                                        class="flex-1 px-3 py-2 border border-gray-200 rounded-lg text-sm">
                                    <input type="hidden" :name="`variantes[${vIndex}][couleurs][${cIndex}][hex]`" x-model="couleur.hex">
                                    <button type="button" @click="removeCouleur(vIndex, cIndex)"
                                        x-show="variante.couleurs.length > 1"
                                        class="text-red-400 hover:text-red-600 p-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                        <button type="button" @click="addCouleur(vIndex)"
                            class="mt-2 text-sm text-nissa-rose hover:text-nissa-choco flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Ajouter une couleur secondaire
                        </button>
                    </div>

                    {{-- Taille, Matière, Prix, Stock --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-nissa-choco mb-1">Taille</label>
                            <select :name="`variantes[${vIndex}][taille_id]`" x-model="variante.taille_id"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                                <option value="">Aucune</option>
                                @foreach ($tailles as $taille)
                                    <option value="{{ $taille->id }}">{{ $taille->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-nissa-choco mb-1">Matière</label>
                            <select :name="`variantes[${vIndex}][matiere_id]`" x-model="variante.matiere_id"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                                <option value="">Aucune</option>
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-nissa-choco mb-1">Prix (FCFA)</label>
                            <input type="number" :name="`variantes[${vIndex}][prix]`" x-model="variante.prix"
                                min="0" placeholder="Base"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-nissa-choco mb-1">Stock</label>
                            <input type="number" :name="`variantes[${vIndex}][stock]`" x-model="variante.stock"
                                min="0"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm">
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <button type="button" @click="addVariante()"
            class="w-full py-3 border-2 border-dashed border-gray-300 rounded-xl text-gray-600 hover:border-nissa-rose hover:text-nissa-rose transition flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Ajouter une variante
        </button>
    </div>

    {{-- Boutons d'action --}}
    <div class="flex gap-3">
        <a href="{{ route('admin.produits.index') }}"
            class="px-6 py-3 border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition">
            Annuler
        </a>
        <button type="submit"
            class="px-6 py-3 bg-nissa-choco text-white rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg flex-1 max-w-xs">
            ✨ Créer le produit
        </button>
    </div>
</form>

<script>
function variantesBuilder() {
    return {
        variantes: [
            { 
                couleurs: [{ nom: '', hex: '#D98B92' }], 
                taille_id: '', 
                matiere_id: '', 
                prix: '', 
                stock: 10 
            }
        ],
        
        addVariante() {
            this.variantes.push({
                couleurs: [{ nom: '', hex: '#D98B92' }],
                taille_id: '',
                matiere_id: '',
                prix: '',
                stock: 10
            });
        },
        
        removeVariante(index) {
            if (this.variantes.length > 1) {
                this.variantes.splice(index, 1);
            }
        },
        
        addCouleur(varianteIndex) {
            this.variantes[varianteIndex].couleurs.push({ nom: '', hex: '#D98B92' });
        },
        
        removeCouleur(varianteIndex, couleurIndex) {
            if (this.variantes[varianteIndex].couleurs.length > 1) {
                this.variantes[varianteIndex].couleurs.splice(couleurIndex, 1);
            }
        }
    }
}
</script>

@endsection