<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeelKindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heelKinds = ['без каблука','шпилька','танкетка','низкий','средний','высокий','платформа'];
        foreach ($heelKinds as $heelKind) {
            DB::table('heel_kinds')->insert([
                'kind' => strtolower($heelKind)
            ]);
        }
    }
}
