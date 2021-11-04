<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tutorial;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tutorial::factory()->count(20)
                ->state(new Sequence(
                    fn ($sequence) => ['song_id' => Song::all()->random()->id],
                ))->create();
    }
}
