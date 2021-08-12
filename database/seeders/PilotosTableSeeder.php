<?php

namespace Database\Seeders;

use App\Models\Piloto;
use Illuminate\Database\Seeder;

class PilotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Piloto::factory(2)->create();
    }
}
