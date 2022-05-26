<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Timezone;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arData = [
            "Уилмингтон" => "America/New_York",
            "Портленд" => "America/Los_Angeles",
            "Торонто" => "America/Toronto",
            "Варшава" => "Europe/Warsaw",
            "Валенсия" => "Europe/Madrid",
            "Шанхай" => "Asia/Shanghai"
        ];
        $arDataFlip = array_flip($arData);
        $result = Timezone::query()->whereIn('name', array_values($arData))->get()
            ->map(function ($item) use ($arDataFlip) {
                return Location::create([
                    'title' => $arDataFlip[$item->name],
                    'timezone_id' => $item->id
                ]);
            });
    }
}
