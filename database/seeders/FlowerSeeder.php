<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flowers')->insert([
            'name' => 'rose',
            'price' => '3',
            'type' => 'Asteraceae',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        DB::table('flowers')->insert([
            'name' => 'lys',
            'price' => '5',
            'type' => 'Asteraceae',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        DB::table('flowers')->insert([
            'name' => 'oeillet',
            'price' => '1',
            'type' => 'Magnoliophyta',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
    }
}
