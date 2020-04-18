<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = ['искуственная кожа','натуральная кожа','искусственная замша','экокожа','текстиль','натуральный нубук',
            'натуральный велюр','натуральная лаковая кожа','натуральная замша','искуственная лаковая кожа','искуственный нубук','полиуретан',
            'искусственный мех','натуральный мех','шерсть','байка','флис','ворсин','полимер','ПВХ','ТЭП','ТПР','ТПУ','резина','ЭВА'];
        foreach ($materials as $material) {
            DB::table('materials')->insert([
                'material' => strtolower($material)
            ]);
        }
    }
}
