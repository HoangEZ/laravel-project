<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image')->delete();
        DB::table('image')->insert([
        	'url'=>'public/images/1.png'
        ]);
        DB::table('image')->insert([
        	'url'=>'public/images/2.png'
        ]);
        DB::table('image')->insert([
        	'url'=>'public/images/3.png'
        ]);
    }
}
