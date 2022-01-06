<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
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
        $user = User::factory()->create(
            [ 'name' => 'Szymon',
              'username' => 'oxygensend',
              'email' => 'test123@test.pl',
              'password' => 'test123']
        );
        Post::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}
