<?php

namespace Database\Seeders;

use App\Models\FreezerBlockProperty;
use Illuminate\Database\Seeder;

class FreezerBlockPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(FreezerBlockProperty::all()->isEmpty()){
            FreezerBlockProperty::create([
                "length" => "2",
                "width" => "1",
                "height" => "1",
                "cost_per_day" => random_int(300, 900)
            ]);
        }

    }
}
