<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['T.Taccardi', 'Cardinalli', 'CARLABEI', 'ALLEE','BALDI'];
        $countries = ['Италия','Китай','Китай','Россия','Россия'];
        $i = 0;
        foreach ($brands as $brand) {
            DB::table('footwear_brands')->insert([
                'brand' => $brand,
                'country' => $countries[$i++]
            ]);
        }
    }
}
