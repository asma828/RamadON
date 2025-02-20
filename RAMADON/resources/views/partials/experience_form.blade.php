<!-- Formulaire d'ajout d'expérience -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h3 class="text-lg font-semibold mb-4">Partagez votre expérience</h3>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 mb-2">Titre</label>
            <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 mb-2">Votre témoignage</label>
            <textarea id="content" name="content" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Images (optionnel)</label>
            <div class="flex items-center justify-center w-full">
                <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-lg tracking-wide border border-blue cursor-pointer hover:bg-gray-100">
                    <i class="fas fa-cloud-upload-alt text-ramadan text-3xl"></i>
                    <span class="mt-2 text-sm text-gray-500">Glissez vos images ici ou cliquez pour sélectionner</span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div>
        </div>
        <button type="submit" class="px-6 py-2 bg-ramadan text-white rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-paper-plane mr-2"></i>Publier
        </button>
    </form>
</div>