<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        
        $experiences = [
            [
                'title' => 'Mon premier jour de jeûne',
                'content' => "J'ai ressenti une paix intérieure que je n'avais jamais connue auparavant. Le moment de l'iftar en famille était vraiment spécial...",
                'like_count' => 23
            ],
            [
                'title' => 'La solidarité pendant le Ramadan',
                'content' => "Cette année, notre communauté s'est réunie pour distribuer des repas aux plus démunis. L'esprit de partage était incroyable...",
                'like_count' => 15
            ],
            [
                'title' => 'Méditation nocturne',
                'content' => "Les prières de Tarawih m'ont permis de me reconnecter avec ma spiritualité. Chaque nuit apporte son lot de réflexions...",
                'like_count' => 18
            ],
        ];
        
        foreach ($experiences as $experience) {
            Experience::create([
                'user_id' => $users->random()->id,
                'title' => $experience['title'],
                'content' => $experience['content'],
                'like_count' => $experience['like_count']
            ]);
        }
    }
}