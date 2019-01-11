<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();
        DB::table('users')->insert([
        	'name'=>'hoangez',
        	'email'=>'hoangez@gmail.com',
        	'password'=>bcrypt('123456')
        ]);
        DB::table('users')->insert([
        	'name'=>'hoangez2',
        	'email'=>'hoangez2@gmail.com',
        	'password'=>bcrypt('123456')
        ]);
    }
}
