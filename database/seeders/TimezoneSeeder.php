<?php

namespace Database\Seeders;

use App\Models\Timezone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = time();
        foreach (timezone_identifiers_list() as $zone) {
            date_default_timezone_set($zone);
            $zones['offset'] = date('P', $timestamp);
            $zones['diff_from_gtm'] = 'UTC/GMT ' . date('P', $timestamp);
            Timezone::updateOrCreate(['name' => $zone], $zones);
        }
    }
}
