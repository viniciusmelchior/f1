<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemporadasTableSeeder extends Seeder
{   

    static $anos = [
        '2020',
        '2021',
        '2022',
        '2023',
        '2024',
        '2025',
        '2026',
        '2027',
        '2028',
        '2029'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        foreach (self::$anos as $ano) {
            DB::table('temporadas')->insert([
                'ano' => $ano
            ]);
        }

    }
}
