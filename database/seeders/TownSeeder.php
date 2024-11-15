<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Town;

class TownSeeder extends Seeder
{
    public function run()
    {
        $towns = [
            ['id' => 1, 'tname' => 'Mindszent', 'countyid' => 8, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 2, 'tname' => 'Komádi', 'countyid' => 16, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 3, 'tname' => 'Tiszacsege', 'countyid' => 16, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 4, 'tname' => 'Nyíradony', 'countyid' => 16, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 5, 'tname' => 'Rákóczifalva', 'countyid' => 15, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 6, 'tname' => 'Mezőkeresztes', 'countyid' => 3, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 7, 'tname' => 'Nagyatád', 'countyid' => 4, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 8, 'tname' => 'Tatabánya', 'countyid' => 17, 'countyseat' => -1, 'countylevel' => -1],
            ['id' => 9, 'tname' => 'Tótkomlós', 'countyid' => 1, 'countyseat' => 0, 'countylevel' => 0],
            ['id' => 10, 'tname' => 'Lenti', 'countyid' => 9, 'countyseat' => 0, 'countylevel' => 0],
        ];

        foreach ($towns as $town) {
            Town::create($town);
        }
    }
}
