<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Main sizes
         */
        for ($i = 9; $i < 59; $i++) {
            DB::table('sizes')->insert([
                'size' => $i,
            ]);
        }
    }
}
