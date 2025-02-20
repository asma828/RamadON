<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Ahmed Benali',
                'email' => 'ahmed@example.com',
                
            ],
            [
                'name' => 'Fatima Zahra',
                'email' => 'fatima@example.com',
            ],
            [
                'name' => 'Karima',
                'email' => 'karima@example.com',
            ],
            [
                'name' => 'Nadia',
                'email' => 'nadia@example.com',
            ],
            [
                'name' => 'Youssef',
                'email' => 'youssef@example.com',
            ],
        ];
        
        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}