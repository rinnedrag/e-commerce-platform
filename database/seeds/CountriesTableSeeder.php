<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = ['Россия','Китай','Италия','Соединённое Королевство','Индонезия','Германия','Индия'];
        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'country' => $country
            ]);
        }
    }
}
