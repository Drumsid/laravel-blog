<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostTag;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostTag::factory()->count(20)
                ->state(new Sequence(
                    fn ($sequence) => [
                        'post_id' => Post::all()->random()->id,
                        'tag_id' => Tag::all()->random()->id
                    ],
                ))->create();
    }
}
