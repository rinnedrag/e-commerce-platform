<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaspKindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $claspKinds = ['без застёжки','пряжка','резинка','липучка','эластичная вставка','молния','шнуровка','завязки'];
        foreach ($claspKinds as $claspKind) {
            DB::table('clasp_kinds')->insert([
                'kind' => strtolower($claspKind)
            ]);
        }
    }
}
