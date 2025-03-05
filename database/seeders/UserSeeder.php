<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->create()
            ->each(function ($user) {
                Post::factory()
                    ->count(5)
                    ->create([
                        'user_id' => $user->id
                    ]);
            });
    }
}
