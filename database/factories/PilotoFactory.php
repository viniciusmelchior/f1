<?php

namespace Database\Factories;

use App\Models\Pais;
use App\Models\Piloto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PilotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Piloto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'nome' => $this->faker->name,
            'pais_id' => rand(1,10)
            

        ];
    }
}
