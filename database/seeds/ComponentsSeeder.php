<?php

use Illuminate\Database\Seeder;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $components = ['подошва','стелька','подкладка','основа'];
        foreach ($components as $component) {
            DB::table('components')->insert([
                'component' => $component,
            ]);
        }
    }
}
