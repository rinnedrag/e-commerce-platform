<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FittingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fittingLiterals = ['A','B','C','D','E','F','G','H','J','K','L','M'];
        foreach ($fittingLiterals as $fittingLiteral) {
            DB::table('fitting')->insert([
               'literal' => $fittingLiteral
            ]);
        }
    }
}
