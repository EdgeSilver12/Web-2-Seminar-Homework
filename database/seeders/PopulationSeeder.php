<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Population;

class PopulationSeeder extends Seeder
{
    public function run()
    {
        $populations = [
            ['townid' => 1, 'ryear' => 2006, 'women' => 7745, 'total' => 14722],
            ['townid' => 2, 'ryear' => 2003, 'women' => 3280, 'total' => 6272],
            ['townid' => 3, 'ryear' => 2016, 'women' => 108479, 'total' => 204754],
            ['townid' => 4, 'ryear' => 2008, 'women' => 8006, 'total' => 15439],
            ['townid' => 5, 'ryear' => 2008, 'women' => 4755, 'total' => 9228],
            ['townid' => 6, 'ryear' => 2015, 'women' => 6223, 'total' => 11745],
            ['townid' => 7, 'ryear' => 2010, 'women' => 45540, 'total' => 86298],
            ['townid' => 8, 'ryear' => 2003, 'women' => 13203, 'total' => 25307],
            ['townid' => 9, 'ryear' => 2019, 'women' => 1532, 'total' => 2859],
            ['townid' => 10, 'ryear' => 2009, 'women' => 11106, 'total' => 21564],
            ['townid' => 1, 'ryear' => 2003, 'women' => 4604, 'total' => 8866],
            ['townid' => 2, 'ryear' => 2012, 'women' => 5378, 'total' => 10429],
        ];

        foreach ($populations as $population) {
            Population::create($population);
        }
    }
}
