<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (User::all()->isEmpty()) {
            \App\Models\User::factory(10)->create();
        }

        $this->call([
            TimezoneSeeder::class,
            LocationSeeder::class,
            FreezerBlockPropertySeeder::class,
            FreezerStorageSeeder::class,
            FreezerBlockSeeder::class
        ]);
    }
}
