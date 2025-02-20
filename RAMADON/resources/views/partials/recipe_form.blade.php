<!-- Formulaire d'ajout de recette -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h3 class="text-lg font-semibold mb-4">Partagez votre recette</h3>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="recipe-title" class="block text-gray-700 mb-2">Nom de la recette</label>
                <input type="text" id="recipe-title" name="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan" required>
            </div>
            <div>
                <label for="category_id" class="block text-gray-700 mb-2">Catégorie</label>
                <select id="category_id" name="category_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-4">
            <label for="ingredients" class="block text-gray-700 mb-2">Ingrédients</label>
            <textarea id="ingredients" name="ingredients" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan" placeholder="Un ingrédient par ligne" required></textarea>
        </div>
        <div class="mb-4">
            <label for="instructions" class="block text-gray-700 mb-2">Instructions</label>
            <textarea id="instructions" name="instructions" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Photo du plat (optionnel)</label>
            <div class="flex items-center justify-center w-full">
                <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-lg tracking-wide border border-blue cursor-pointer hover:bg-gray-100">
                    <i class="fas fa-camera text-ramadan text-3xl"></i>
                    <span class="mt-2 text-sm text-gray-500">Ajoutez une photo de votre plat</span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div>
        </div>
        <button type="submit" class="px-6 py-2 bg-ramadan text-white rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-utensils mr-2"></i>Partager la recette
        </button>
    </form>
</div>
