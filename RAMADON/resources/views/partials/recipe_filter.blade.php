<!-- Filtre par catégorie -->
<div class="flex flex-wrap gap-2 mb-6">
    <a href="{{ route('recipes.index') }}" class="px-4 py-2 bg-white border {{ request('category') ? 'border-gray-300 text-gray-700' : 'border-ramadan text-ramadan' }} rounded-lg hover:border-ramadan hover:text-ramadan transition">
        Toutes les recettes
    </a>
    @foreach(\App\Models\Category::all() as $category)
        <a href="{{ route('recipes.index', ['category' => $category->id]) }}" 
           class="px-4 py-2 bg-white border {{ request('category') == $category->id ? 'border-ramadan text-ramadan' : 'border-gray-300 text-gray-700' }} rounded-lg hover:border-ramadan hover:text-ramadan transition">
            {{ $category->name }}
        </a>
    @endforeach
</div>
