<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(20)
                ->state(new Sequence(
                    fn ($sequence) => ['category_id' => Category::all()->random()->id],
                ))->create();
    }
}
