<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Experience;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $experiences = Experience::all();
        $recipes = Recipe::all();
        
        $experienceComments = [
            "Merci pour ce témoignage inspirant !",
            "J'ai ressenti la même chose lors de mon premier jour.",
            "Que Dieu accepte vos prières et votre jeûne.",
            "Cette expérience me touche particulièrement.",
            "Comment gérez-vous les moments difficiles pendant le jeûne?"
        ];
        
        $recipeComments = [
            "J'ai essayé cette recette, délicieux !",
            "Peut-on remplacer certains ingrédients?",
            "Parfait pour le ftour en famille.",
            "Combien de personnes cette recette sert-elle?",
            "Je vais essayer ça ce soir, merci du partage!"
        ];
        
        // Ajouter des commentaires aux expériences
        foreach ($experiences as $experience) {
            $commentCount = rand(2, 5);
            for ($i = 0; $i < $commentCount; $i++) {
                Comment::create([
                    'user_id' => $users->random()->id,
                    'experience_id' => $experience->id,
                    'content' => $experienceComments[array_rand($experienceComments)]
                ]);
            }
        }
        
 
    }
}