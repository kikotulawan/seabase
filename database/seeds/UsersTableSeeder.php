<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Anthony Carl Meniado',
            'email' => 'carlsus@gmail.com',
            'password' => bcrypt('fr@gm3ntS'),
            'position' => 'Web Developer',
            'signatory' => 0,
            'built_in' => 1,
            'company_id' => 1
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Conautic Maritime Inc',
            'email' => 'cmi@conautic.com',
            'password' => bcrypt('admin'),
            'position' => 'System Administrator',
            'signatory' => 0,
            'built_in' => 1,
            'company_id' =>1
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'John Doe',
            'email' => 'jdoe@email.com',
            'password' => bcrypt('password'),
            'position' => 'System Administrator',
            'signatory' => 0,
            'built_in' => 0,
            'company_id' => 1
        ]);
    }
}
