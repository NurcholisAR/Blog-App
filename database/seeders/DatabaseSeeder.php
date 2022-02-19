<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
        \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Nurcholis Aulia Rachman',
            'username' => 'Nurcholis',
            'email' => 'rachmannurcholis@gmail.com',
            'password' => bcrypt('1234')
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        Post::factory(20)->create();
    }
}
