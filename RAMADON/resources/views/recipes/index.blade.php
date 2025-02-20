@extends('layouts.app')

@section('title', 'Recettes - Ramadan 2025')

@section('content')
    <!-- En-tête de la page -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-ramadan flex items-center justify-center">
                <i class="fas fa-utensils text-gold"></i>
            </div>
            <h2 class="text-xl font-semibold ml-3">Nos Recettes pour le Ramadan</h2>
        </div>
        <p class="text-gray-700">Découvrez notre collection de recettes traditionnelles et modernes pour le Ramadan. Des plats savoureux pour le Suhoor et l'Iftar.</p>
    </div>

    <!-- Filtres et recherche -->
    @include('partials.recipe_filter') 

    <!-- Grille de recettes -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($recipes as $recipe)
            <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                @if($recipe->image_path)
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                @else
                    <img src="/api/placeholder/400/250" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $recipe->category->name }}
                        </span>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="text-sm text-gray-500 ml-1">{{ number_format(rand(4, 5) + rand(0, 9)/10, 1) }} ({{ rand(10, 50) }})</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">{{ $recipe->title }}</h3>
                    <p class="text-gray-700 text-sm mb-4">{{ Str::limit($recipe->ingredients, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center text-sm text-gray-500">
                            <img src="/api/placeholder/50/50" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                            <span>{{ $recipe->user->name ?? 'Anonyme' }}</span>
                        </div>
                        <button class="text-ramadan hover:underline text-sm">
                            Voir la recette
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $recipes->links() }}
    </div>

    <!-- Bouton d'ajout de recette -->
    {{-- <div class="fixed bottom-8 right-8">
        <a href="{{ route('recipes.create') }}" class="flex items-center justify-center w-14 h-14 bg-ramadan text-white rounded-full shadow-lg hover:bg-opacity-90 transition">
            <i class="fas fa-plus text-xl"></i>
        </a>
    </div> --}}
@endsection

@section('scripts')
<script>
    // Filtres dynamiques
    document.querySelectorAll('select, input').forEach(element => {
        element.addEventListener('change', function() {
            // Ici, vous pouvez ajouter la logique pour mettre à jour les résultats
            // via AJAX ou en rechargeant la page avec les paramètres
        });
    });
</script>
@endsection