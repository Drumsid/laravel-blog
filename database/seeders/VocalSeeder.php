<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vocal;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Sequence;

class VocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vocal::factory()->count(20)
                ->state(new Sequence(
                    fn ($sequence) => ['song_id' => Song::all()->random()->id],
                ))->create();
    }
}
