<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre')->delete();
        DB::table('genre')->insert([
        	'genre'=>'Thể loại 1'
        ]);
        DB::table('genre')->insert([
        	'genre'=>'Thể loại 2'
        ]);
        DB::table('genre')->insert([
        	'genre'=>'Thể loại 3'
        ]);
    }
}
