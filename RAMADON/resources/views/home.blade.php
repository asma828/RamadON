@extends('layouts.app')

@section('title', 'Accueil - Ramadan 2025')

@section('content')
    <!-- Conseil du jour -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-ramadan flex items-center justify-center">
                <i class="fas fa-lightbulb text-gold"></i>
            </div>
            <h2 class="text-xl font-semibold ml-3">Conseil du jour</h2>
        </div>
        <p class="text-gray-700">"Le Ramadan est l'occasion de purifier non seulement notre corps, mais aussi notre esprit et notre cœur. Prenez le temps chaque jour de méditer sur vos actions et vos intentions."</p>
        <p class="text-sm text-gray-500 mt-2">Publié par Admin le {{ now()->format('d F Y') }}</p>
    </div>

    <!-- Navigation par onglets -->
    <div class="mb-8">
        <div class="flex flex-wrap border-b border-gray-200">
            <button class="tab-btn active px-6 py-3 text-ramadan border-b-2 border-ramadan" data-tab="experiences">
                <i class="fas fa-book-open mr-2"></i>Expériences
            </button>
            <button class="tab-btn px-6 py-3 text-gray-500 hover:text-ramadan" data-tab="recipes">
                <i class="fas fa-utensils mr-2"></i>Recettes
            </button>
        </div>
    </div>

    <!-- Contenu des onglets -->
    <div id="experiences" class="tab-content active">
        @include('partials.experience_form')

        <!-- Liste des expériences -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($experiences as $experience)
                @include('partials.experience_card', ['experience' => $experience])
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('experiences.index') }}" class="px-6 py-2 border border-ramadan text-ramadan rounded-lg hover:bg-ramadan hover:text-white transition">
                Voir plus d'expériences
            </a>
        </div>
    </div>

    <div id="recipes" class="tab-content">
        {{-- @include('partials.recipe_filter') --}}
        @include('partials.recipe_form')

        <!-- Liste des recettes populaires -->
        <h3 class="text-xl font-semibold mb-4">Recettes populaires</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($popularRecipes as $recipe)
                @include('partials.recipe_card', ['recipe' => $recipe])
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('recipes.index') }}" class="px-6 py-2 border border-ramadan text-ramadan rounded-lg hover:bg-ramadan hover:text-white transition">
                Découvrir plus de recettes
            </a>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Tabs functionality
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => btn.classList.remove('active', 'border-ramadan', 'text-ramadan'));
            tabButtons.forEach(btn => btn.classList.add('text-gray-500'));
            tabContents.forEach(content => content.classList.remove('active'));

            // Add active class to clicked button and corresponding content
            button.classList.add('active', 'border-ramadan', 'text-ramadan');
            button.classList.remove('text-gray-500');
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
</script>
@endsection