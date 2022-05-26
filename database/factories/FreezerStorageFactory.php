<?php

namespace Database\Factories;

use App\Models\FreezerStorage;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreezerStorageFactory extends Factory
{
    protected $model = FreezerStorage::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'temperature' => random_int(-100, 100),
            'location_id'=> Location::all()->random()
        ];
    }
}
