<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

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

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
