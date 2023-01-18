<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
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
