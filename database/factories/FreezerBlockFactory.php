<?php

namespace Database\Factories;

use App\Models\FreezerBlockProperty;
use App\Models\FreezerStorage;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreezerBlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "freezer_storage_id" => FreezerStorage::all()->random(),
            "freezer_block_property_id" => FreezerBlockProperty::all()->random(),
        ];
    }
}
