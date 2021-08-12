<?php

namespace Database\Seeders;

use App\Models\Piloto;
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
        //Piloto::factory()->create();
        //$this->call(PaisesTableSeeder::class);
        //$this->call(PilotosTableSeeder::class);
        $this->call(TemporadasTableSeeder::class);
    }
}
