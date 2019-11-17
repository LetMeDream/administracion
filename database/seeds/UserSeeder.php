<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        DB::table('users')->insert([
            array(
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('contraseña'),
                'isAdmin' => 1
            ),
            array(
                'name' => 'Paul Talker',
                'email' => 'paul@talker.com',
                'password' => bcrypt('password'),
                'isAdmin' => 0
            ),
            array(
                'name' => 'Joe Jonas',
                'email' => 'joe@jonas.com',
                'password' => bcrypt('password'),
                'isAdmin' => 0
            )
        ]);
    }
}
