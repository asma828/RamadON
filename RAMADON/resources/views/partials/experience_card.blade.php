<div class="card bg-white rounded-lg shadow-md overflow-hidden">
    <div class="relative">
        @if($experience->image_path)
            <img src="{{ asset('storage/' . $experience->image_path) }}" alt="{{ $experience->title }}" class="w-full h-48 object-cover">
        @else
            <img src="/api/placeholder/600/300" alt="Image d'expérience" class="w-full h-48 object-cover">
        @endif
        <div class="absolute top-0 right-0 bg-white px-2 py-1 m-2 rounded-lg text-sm">
            <i class="fas fa-eye text-gray-500 mr-1"></i> {{ rand(50, 200) }} <!-- Pour la démo -->
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
            <button onclick="openCommentsModal({{ $experience->id }})" class="text-ramadan hover:underline">
                <i class="far fa-comment mr-1"></i> {{ $experience->comments->count() }} commentaires
            </button>
            <button class="text-gray-500 hover:text-ramadan">
                <i class="far fa-bookmark"></i>
            </button>
        </div>
    </div>
</div>