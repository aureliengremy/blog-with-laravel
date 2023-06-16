<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

         $userOne = User::factory()->create([
             'username'=>'JohnDoe87',
             'name'=>'John Doe'
         ]);

         $userTwo = User::factory()->create([
             'username'=>'ElvisDu77',
             'name'=>'Elvis Presley'
         ]);
         $userThird = User::factory()->create([
             'username'=>'Marion1991',
             'name'=>'Marion Serin'
         ]);

         $categoryOne = Category::factory()->create([
             'name'=>'Personal',
             'slug'=>'personal'
         ]);
        $categoryTwo = Category::factory()->create([
            'name'=>'Professional',
            'slug'=>'professional'
        ]);

        Post::factory(7)->create([
            'user_id'=>$userOne->id,
            'category_id'=>$categoryOne->id,
        ]);
        Post::factory(3)->create([
            'user_id'=>$userOne->id,
            'category_id'=>$categoryTwo->id,
        ]);
        Post::factory(4)->create([
            'user_id'=>$userTwo->id,
            'category_id'=>$categoryOne->id,
        ]);
        Post::factory(6)->create([
            'user_id'=>$userTwo->id,
            'category_id'=>$categoryTwo->id,
        ]);
        Post::factory(5)->create([
            'user_id'=>$userThird->id,
            'category_id'=>$categoryOne->id,
        ]);
        Post::factory(5)->create([
            'user_id'=>$userThird->id,
            'category_id'=>$categoryTwo->id,
        ]);





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
