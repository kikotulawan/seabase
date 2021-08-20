<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'id' => 1,
            'department' => 'DECK',
            'user_id' => 2
        ]);
        DB::table('departments')->insert([
            'id' => 2,
            'department' => 'ENGINE',
            'user_id' => 2
        ]);
        DB::table('departments')->insert([
            'id' => 3,
            'department' => 'STEWARD',
            'user_id' => 2
        ]);
        DB::table('departments')->insert([
            'id' => 4,
            'department' => 'GALLEY',
            'user_id' => 2
        ]);
    }
}
