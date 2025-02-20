<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $categories = Category::all();
        
        $recipes = [
            [
                'title' => 'Chorba traditionnelle',
                'ingredients' => "500g de viande d'agneau coupée en dés\n1 oignon haché\n2 tomates concassées\n1 c. à soupe de concentré de tomate\n100g de pois chiches trempés\n2 c. à soupe d'huile d'olive\nÉpices: sel, poivre, cumin, paprika\n1 bouquet de coriandre\n2L d'eau",
                'instructions' => "1. Faire revenir la viande avec l'oignon dans l'huile d'olive\n2. Ajouter les tomates et le concentré\n3. Incorporer les épices et les pois chiches\n4. Verser l'eau et laisser mijoter 1h30\n5. Parsemer de coriandre avant de servir",
                'category_name' => 'Iftar',
                'like_count' => 45
            ],
            [
                'title' => 'Baklava au miel',
                'ingredients' => "500g de pâte filo\n400g de noix mixtes (pistaches, amandes, noix) hachées\n250g de beurre fondu\n200g de miel\n1 c. à soupe d'eau de fleur d'oranger\n1 c. à café de cannelle",
                'instructions' => "1. Beurrer un plat à four\n2. Alterner les couches de pâte filo beurrée et le mélange de noix/cannelle\n3. Découper en losanges avant cuisson\n4. Cuire à 180°C pendant 30 minutes\n5. Verser le sirop de miel et eau de fleur d'oranger chaud sur la baklava chaude\n6. Laisser reposer 4h avant de servir",
                'category_name' => 'Desserts',
                'like_count' => 38
            ],
            [
                'title' => 'Dates fourrées aux amandes',
                'ingredients' => "24 dattes Medjool\n100g d'amandes entières\n2 c. à soupe de miel\n1/2 c. à café de cannelle\nNoix de coco râpée pour décorer",
                'instructions' => "1. Dénoyauter les dattes avec précaution\n2. Mélanger les amandes concassées avec le miel et la cannelle\n3. Farcir chaque datte avec le mélange\n4. Rouler dans la noix de coco râpée\n5. Réfrigérer 1h avant de servir",
                'category_name' => 'Suhoor',
                'like_count' => 42
            ],
        ];
        
        foreach ($recipes as $recipe) {
            $category = $categories->where('name', $recipe['category_name'])->first();
            
            Recipe::create([
                'user_id' => $users->random()->id,
                'category_id' => $category->id,
                'title' => $recipe['title'],
                'ingredients' => $recipe['ingredients'],
                'instructions' => $recipe['instructions'],
                'like_count' => $recipe['like_count']
            ]);
        }
    }
}