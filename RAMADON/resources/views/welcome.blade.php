<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramadan 2025 - Partagez vos expériences</title>
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
                    <i class="fas fa-moon text-gold text-3xl mr-3"></i>
                    <h1 class="text-2xl font-bold">Ramadan 2025</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="loginBtn" class="px-4 py-2 rounded border border-gold text-gold hover:bg-gold hover:text-ramadan transition">
                        <i class="fas fa-user mr-2"></i>Connexion
                    </button>
                    <div class="text-center">
                        <p class="text-sm">Publications: <span id="total-posts" class="font-bold">120</span></p>
                        <p class="text-sm">Recettes: <span id="total-recipes" class="font-bold">85</span></p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <!-- Conseil du jour -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 rounded-full bg-ramadan flex items-center justify-center">
                    <i class="fas fa-lightbulb text-gold"></i>
                </div>
                <h2 class="text-xl font-semibold ml-3">Conseil du jour</h2>
            </div>
            <p class="text-gray-700">"Le Ramadan est l'occasion de purifier non seulement notre corps, mais aussi notre esprit et notre cœur. Prenez le temps chaque jour de méditer sur vos actions et vos intentions."</p>
            <p class="text-sm text-gray-500 mt-2">Publié par Admin le 15 mars 2025</p>
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
            <!-- Formulaire d'ajout d'expérience -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h3 class="text-lg font-semibold mb-4">Partagez votre expérience</h3>
                <form>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 mb-2">Titre</label>
                        <input type="text" id="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 mb-2">Votre témoignage</label>
                        <textarea id="content" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Images (optionnel)</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-lg tracking-wide border border-blue cursor-pointer hover:bg-gray-100">
                                <i class="fas fa-cloud-upload-alt text-ramadan text-3xl"></i>
                                <span class="mt-2 text-sm text-gray-500">Glissez vos images ici ou cliquez pour sélectionner</span>
                                <input type="file" class="hidden" multiple>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="px-6 py-2 bg-ramadan text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-paper-plane mr-2"></i>Publier
                    </button>
                </form>
            </div>

            <!-- Liste des expériences -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Expérience 1 -->
                <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="/api/placeholder/600/300" alt="Image d'expérience" class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-white px-2 py-1 m-2 rounded-lg text-sm">
                            <i class="fas fa-eye text-gray-500 mr-1"></i> 120
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Mon premier jour de jeûne</h3>
                        <p class="text-gray-700 mb-4">J'ai ressenti une paix intérieure que je n'avais jamais connue auparavant. Le moment de l'iftar en famille était vraiment spécial...</p>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <img src="/api/placeholder/50/50" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                            <span>Par Ahmed Benali</span>
                            <span class="mx-2">•</span>
                            <span>12 mars 2025</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <button class="text-ramadan hover:underline">
                                <i class="far fa-comment mr-1"></i> 23 commentaires
                            </button>
                            <button class="text-gray-500 hover:text-ramadan">
                                <i class="far fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Expérience 2 -->
                <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="/api/placeholder/600/300" alt="Image d'expérience" class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-white px-2 py-1 m-2 rounded-lg text-sm">
                            <i class="fas fa-eye text-gray-500 mr-1"></i> 85
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">La solidarité pendant le Ramadan</h3>
                        <p class="text-gray-700 mb-4">Cette année, notre communauté s'est réunie pour distribuer des repas aux plus démunis. L'esprit de partage était incroyable...</p>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <img src="/api/placeholder/50/50" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                            <span>Par Fatima Zahra</span>
                            <span class="mx-2">•</span>
                            <span>10 mars 2025</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <button class="text-ramadan hover:underline">
                                <i class="far fa-comment mr-1"></i> 15 commentaires
                            </button>
                            <button class="text-gray-500 hover:text-ramadan">
                                <i class="far fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <button class="px-6 py-2 border border-ramadan text-ramadan rounded-lg hover:bg-ramadan hover:text-white transition">
                    Voir plus d'expériences
                </button>
            </div>
        </div>

        <div id="recipes" class="tab-content">
            <!-- Filtre par catégorie -->
            <div class="flex flex-wrap gap-2 mb-6">
                <button class="px-4 py-2 bg-white border border-ramadan text-ramadan rounded-lg hover:bg-ramadan hover:text-white transition">
                    Toutes les recettes
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:border-ramadan hover:text-ramadan transition">
                    Iftar
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:border-ramadan hover:text-ramadan transition">
                    Suhoor
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:border-ramadan hover:text-ramadan transition">
                    Entrées
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:border-ramadan hover:text-ramadan transition">
                    Plats
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:border-ramadan hover:text-ramadan transition">
                    Desserts
                </button>
            </div>

            <!-- Formulaire d'ajout de recette -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h3 class="text-lg font-semibold mb-4">Partagez votre recette</h3>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="recipe-title" class="block text-gray-700 mb-2">Nom de la recette</label>
                            <input type="text" id="recipe-title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan">
                        </div>
                        <div>
                            <label for="category" class="block text-gray-700 mb-2">Catégorie</label>
                            <select id="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan">
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="iftar">Iftar</option>
                                <option value="suhoor">Suhoor</option>
                                <option value="entree">Entrée</option>
                                <option value="plat">Plat principal</option>
                                <option value="dessert">Dessert</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="ingredients" class="block text-gray-700 mb-2">Ingrédients</label>
                        <textarea id="ingredients" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan" placeholder="Un ingrédient par ligne"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="instructions" class="block text-gray-700 mb-2">Instructions</label>
                        <textarea id="instructions" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ramadan"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Photo du plat (optionnel)</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-lg tracking-wide border border-blue cursor-pointer hover:bg-gray-100">
                                <i class="fas fa-camera text-ramadan text-3xl"></i>
                                <span class="mt-2 text-sm text-gray-500">Ajoutez une photo de votre plat</span>
                                <input type="file" class="hidden">
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="px-6 py-2 bg-ramadan text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-utensils mr-2"></i>Partager la recette
                    </button>
                </form>
            </div>

            <!-- Liste des recettes populaires -->
            <h3 class="text-xl font-semibold mb-4">Recettes populaires</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Recette 1 -->
                <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/api/placeholder/400/250" alt="Chorba" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Iftar</span>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-sm text-gray-500 ml-1">4.9 (45)</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Chorba traditionnelle</h3>
                        <p class="text-gray-700 text-sm mb-4">Une soupe traditionnelle parfaite pour rompre le jeûne, riche en saveurs et en nutriments.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <img src="/api/placeholder/50/50" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                                <span>Karima</span>
                            </div>
                            <button class="text-ramadan hover:underline text-sm">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recette 2 -->
                <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/api/placeholder/400/250" alt="Baklava" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Dessert</span>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-sm text-gray-500 ml-1">4.7 (38)</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Baklava au miel</h3>
                        <p class="text-gray-700 text-sm mb-4">Un dessert délicieux et sucré, parfait pour les soirées de Ramadan en famille.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <img src="/api/placeholder/50/50" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                                <span>Nadia</span>
                            </div>
                            <button class="text-ramadan hover:underline text-sm">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recette 3 -->
                <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/api/placeholder/400/250" alt="Dates fourrées" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Suhoor</span>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-sm text-gray-500 ml-1">4.8 (42)</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Dates fourrées aux amandes</h3>
                        <p class="text-gray-700 text-sm mb-4">Un en-cas nutritif pour le suhoor, combinant l'énergie des dattes et des protéines.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <img src="/api/placeholder/50/50" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                                <span>Youssef</span>
                            </div>
                            <button class="text-ramadan hover:underline text-sm">
                                Voir la recette
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <button class="px-6 py-2 border border-ramadan text-ramadan rounded-lg hover:bg-ramadan hover:text-white transition">
                    Découvrir plus de recettes
                </button>
            </div>
        </div>
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

        // Login modal functionality would be implemented here
        document.getElementById('loginBtn').addEventListener('click', () => {
            alert('Cette fonctionnalité serait implémentée avec Laravel Breeze/Jetstream');
        });
    </script>
</body>
</html>