<?php

namespace Database\Seeders;

use App\Models\FreezerStorage;
use Illuminate\Database\Seeder;

class FreezerStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreezerStorage::factory(100)->create();
    }
}
