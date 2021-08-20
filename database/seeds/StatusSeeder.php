<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'id' => 1,
            'status' => 'New Applicant',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 2,
            'status' => 'Online Applicant',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 3,
            'status' => 'Pool',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 4,
            'status' => 'Operation',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 5,
            'status' => 'Rejected',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 6,
            'status' => 'Available',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 7,
            'status' => 'On-board',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 8,
            'status' => 'On Vacation',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 9,
            'status' => 'On Sick Leave',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 10,
            'status' => 'Resigned',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 11,
            'status' => 'Line-up',
            'user_id' => 2
        ]);
        DB::table('statuses')->insert([
            'id' => 12,
            'status' => 'On Shore',
            'user_id' => 2
        ]);
    }
}
