<?php

namespace Database\Factories;

use App\Models\FreezerStorage;
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
            'temperature' => random_int(-20, 0)
        ];
    }
}
