<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FootwearKindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footwearKinds = ['ботинки','сапоги','босоножки','туфли','полуботинки','кеды','кроссовки'];
        foreach ($footwearKinds as $footwearKind) {
            DB::table('footwear_kinds')->insert([
                'kind' => strtolower($footwearKind)
            ]);
        }
    }
}
