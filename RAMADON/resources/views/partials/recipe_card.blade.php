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