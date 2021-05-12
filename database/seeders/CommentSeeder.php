<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'subject' => 'Test',
            'message' => 'This flower is amazing',
            'flower_id' => 3
        ]);
        DB::table('comments')->insert([
            'subject' => 'Rose comment',
            'message' => 'This flower is amazing',
            'flower_id' => 1
        ]);
    }
}
