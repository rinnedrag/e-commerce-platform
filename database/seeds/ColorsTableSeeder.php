<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Main colors
         */
        $colors = ['бежевый','белый','голубой','жёлтый','зелёный','коричневый',
            'красный','оранжевый','розовый','серый','голубой','фиолетовый','черный'];
        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'color' => $color,
            ]);
        }
    }
}
