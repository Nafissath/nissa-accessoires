@extends('admin.layouts.admin')

@section('title', 'Connexion')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-nissa-choco to-[#6B4423] p-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl p-8">
        
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-nissa-choco mb-1" style="font-family: 'Playfair Display', serif;">
                NISSA
            </h1>
            <p class="text-xs uppercase tracking-[0.35em] text-nissa-rose">Administration</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.connecter') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-nissa-choco mb-2">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-nissa-rose focus:ring-nissa-rose">
                <label for="remember" class="ml-2 text-sm text-gray-600">Se souvenir de moi</label>
            </div>

            <button type="submit" class="w-full bg-nissa-choco text-white py-3 rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg">
                Se connecter
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('accueil') }}" class="text-sm text-gray-500 hover:text-nissa-rose transition">
                ← Retour au site
            </a>
        </div>
    </div>
</div>
@endsection