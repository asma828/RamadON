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
