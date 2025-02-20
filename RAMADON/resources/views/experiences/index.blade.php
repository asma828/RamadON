@extends('layouts.app')

@section('title', 'Expériences - Ramadan 2025')

@section('content')
    <!-- En-tête de la page -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-ramadan flex items-center justify-center">
                <i class="fas fa-book-open text-gold"></i>
            </div>
            <h2 class="text-xl font-semibold ml-3">Expériences du Ramadan</h2>
        </div>
        <p class="text-gray-700">Découvrez et partagez vos expériences personnelles du Ramadan. Ensemble, créons une communauté d'entraide et de partage.</p>
    </div>

    <!-- Filtres et recherche -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative">
                <input type="text" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ramadan focus:border-ramadan" 
                    placeholder="Rechercher une expérience...">
                <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-ramadan focus:border-ramadan">
                <option value="newest">Plus récentes</option>
                <option value="popular">Plus populaires</option>
                <option value="commented">Plus commentées</option>
            </select>
            <button class="px-6 py-2 bg-ramadan text-white rounded-lg hover:bg-opacity-90 transition">
                <i class="fas fa-filter mr-2"></i>Appliquer les filtres
            </button>
        </div>
    </div>

    <!-- Grille d'expériences -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($experiences as $experience)
            <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    @if($experience->image_path)
                        <img src="{{ asset('storage/' . $experience->image_path) }}" alt="{{ $experience->title }}" class="w-full h-48 object-cover">
                    @else
                        <img src="/api/placeholder/600/300" alt="Image d'expérience" class="w-full h-48 object-cover">
                    @endif
                    <div class="absolute top-0 right-0 bg-white px-2 py-1 m-2 rounded-lg text-sm">
                        <i class="fas fa-eye text-gray-500 mr-1"></i> {{ rand(50, 200) }}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $experience->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ Str::limit($experience->content, 150) }}</p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <img src="/api/placeholder/50/50" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                        <span>Par {{ $experience->user->name ?? 'Utilisateur' }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $experience->created_at->format('j M Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <button class="text-ramadan hover:underline">
                            <i class="far fa-comment mr-1"></i> {{ $experience->comments->count() }} commentaires
                        </button>
                        <button class="text-gray-500 hover:text-ramadan">
                            <i class="far fa-bookmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $experiences->links() }}
    </div>

   
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