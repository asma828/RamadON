<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramadan 2025 - @yield('title', 'Partagez vos expériences')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .bg-ramadan {
            background-color: #1E3A8A;
        }
        .text-gold {
            color: #F3C677;
        }
        .border-gold {
            border-color: #F3C677;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-ramadan text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-moon text-gold text-3xl mr-3"></i>
                        <h1 class="text-2xl font-bold">Ramadan 2025</h1>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="loginBtn" class="px-4 py-2 rounded border border-gold text-gold hover:bg-gold hover:text-ramadan transition">
                        <i class="fas fa-user mr-2"></i>Connexion
                    </button>
                    <div class="text-center">
                        <p class="text-sm">Publications: <span id="total-posts" class="font-bold">{{ $totalPosts ?? 0 }}</span></p>
                        <p class="text-sm">Recettes: <span id="total-recipes" class="font-bold">{{ $totalRecipes ?? 0 }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-ramadan text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                        <i class="fas fa-moon text-gold text-2xl mr-3"></i>
                        <h2 class="text-xl font-bold">Ramadan 2025</h2>
                    </div>
                    <p class="text-sm mt-2">Partagez, découvrez, inspirez</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-white hover:text-gold"><i class="fab fa-facebook-f text-xl"></i></a>
                    <a href="#" class="text-white hover:text-gold"><i class="fab fa-twitter text-xl"></i></a>
                    <a href="#" class="text-white hover:text-gold"><i class="fab fa-instagram text-xl"></i></a>
                </div>
            </div>
            <hr class="border-gray-700 my-6">
            <div class="text-center text-sm">
                <p>&copy; 2025 Plateforme Ramadan. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Login modal functionality would be implemented here
        document.getElementById('loginBtn').addEventListener('click', () => {
            alert('Cette fonctionnalité n\'est pas implémentée dans cette version');
        });
    </script>
    @yield('scripts')
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <!-- ... autres meta tags ... -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
    <style>
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
        }

        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            background: white;
            border-radius: 0.5rem;
            z-index: 50;
            overflow-y: auto;
        }

        .modal-body {
            max-height: calc(90vh - 100px);
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <!-- ... votre contenu ... -->
    @include('partials.comments-modal')

    @stack('scripts')
    <script>
        let currentExperienceId = null;

        function openCommentsModal(experienceId) {
            currentExperienceId = experienceId;
            const modal = document.getElementById('commentsModal');
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            
            fetch(`/experiences/${experienceId}/comments`)
                .then(response => response.json())
                .then(data => {
                    const modalBody = modal.querySelector('.modal-body');
                    modalBody.innerHTML = `
                        <!-- Détails de l'expérience -->
                        <div class="mb-6">
                            <div class="flex items-center mb-4">
                                <img src="/api/placeholder/50/50" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <div class="font-medium">${data.experience.user.name}</div>
                                    <div class="text-sm text-gray-500">${data.experience.created_at}</div>
                                </div>
                            </div>
                            <h4 class="text-lg font-semibold mb-2">${data.experience.title}</h4>
                            <p class="text-gray-700">${data.experience.content}</p>
                        </div>

                        <!-- Formulaire de commentaire -->
                        <form id="commentForm" class="mb-6">
                            <div class="mb-4">
                                <textarea name="content" rows="3" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ramadan focus:border-ramadan"
                                    placeholder="Ajoutez votre commentaire..."></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-ramadan text-white rounded-lg hover:bg-opacity-90 transition">
                                    Publier
                                </button>
                            </div>
                        </form>

                        <!-- Liste des commentaires -->
                        <div class="space-y-6" id="commentsList">
                            ${data.comments.map(comment => `
                                <div class="border-b border-gray-200 pb-6 last:border-0">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <img src="/api/placeholder/50/50" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                                            <div>
                                                <div class="font-medium">${comment.user.name}</div>
                                                <div class="text-xs text-gray-500">${comment.created_at}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-700">${comment.content}</p>
                                </div>
                            `).join('')}
                        </div>
                    `;

                    // Configuration du gestionnaire de formulaire
                    const form = document.getElementById('commentForm');
                    form.onsubmit = handleCommentSubmit;
                });
        }

        function closeCommentsModal() {
            const modal = document.getElementById('commentsModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            currentExperienceId = null;
        }

        function handleCommentSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const content = form.querySelector('textarea').value;

            fetch(`/experiences/${currentExperienceId}/comments`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ content })
            })
            .then(response => response.json())
            .then(data => {
                const commentsList = document.getElementById('commentsList');
                const newComment = `
                    <div class="border-b border-gray-200 pb-6 last:border-0">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <img src="/api/placeholder/50/50" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                                <div>
                                    <div class="font-medium">${data.user.name}</div>
                                    <div class="text-xs text-gray-500">À l'instant</div>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">${data.content}</p>
                    </div>
                `;
                commentsList.insertAdjacentHTML('afterbegin', newComment);
                form.reset();
            });
        }

        // Fermer le modal en cliquant à l'extérieur
        document.getElementById('commentsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCommentsModal();
            }
        });
    </script>
</body>
</html>
