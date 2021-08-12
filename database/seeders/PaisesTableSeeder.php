<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisesTableSeeder extends Seeder
{   
    static $paises = [
        'Brasil',
        'Alemanha',
        'Italia',
        'Inglaterra',
        'Belgica',
        'Portugal',
        'Monaco',
        'França'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (self::$paises as $pais) {
            DB::table('paises')->insert([
                'nome' => $pais
            ]);
        }
    }
}
