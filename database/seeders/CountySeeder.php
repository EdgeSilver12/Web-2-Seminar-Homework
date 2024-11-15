<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\County;

class CountySeeder extends Seeder
{
    public function run()
    {
        $counties = [
            ['id' => 1, 'cname' => 'Békés'],
            ['id' => 2, 'cname' => 'Heves'],
            ['id' => 3, 'cname' => 'Borsod-Abaúj-Zemplén'],
            ['id' => 4, 'cname' => 'Somogy'],
            ['id' => 5, 'cname' => 'Fejér'],
            ['id' => 6, 'cname' => 'Vas'],
            ['id' => 7, 'cname' => 'Pest'],
            ['id' => 8, 'cname' => 'Csongrád'],
            ['id' => 9, 'cname' => 'Zala'],
            ['id' => 10, 'cname' => 'Budapest'],
            ['id' => 11, 'cname' => 'Bács-Kiskun'],
            ['id' => 12, 'cname' => 'Baranya'],
            ['id' => 13, 'cname' => 'Tolna'],
            ['id' => 14, 'cname' => 'Nógrád'],
            ['id' => 15, 'cname' => 'Jász-Nagykun-Szolnok'],
            ['id' => 16, 'cname' => 'Hajdú-Bihar'],
            ['id' => 17, 'cname' => 'Komárom-Esztergom'],
            ['id' => 18, 'cname' => 'Veszprém'],
            ['id' => 19, 'cname' => 'Győr-Moson-Sopron'],
            ['id' => 20, 'cname' => 'Szabolcs-Szatmár-Bereg'],
        ];

        foreach ($counties as $county) {
            County::create($county);
        }
    }
}
