<?php

namespace Database\Seeders;

use App\Models\FreezerBlock;
use Illuminate\Database\Seeder;

class FreezerBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(FreezerBlock::all()->isEmpty()){
            FreezerBlock::factory(1000)->create();
        }
    }
}
