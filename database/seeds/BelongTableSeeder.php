<?php

use Illuminate\Database\Seeder;

class BelongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('belong')->delete();
        DB::table('belong')->insert([
        	'entry_id'=>'1',
			'genre_id'=>'1'
        ]);
        DB::table('belong')->insert([
        	'entry_id'=>'2',
			'genre_id'=>'1'
        ]);
        DB::table('belong')->insert([
        	'entry_id'=>'3',
			'genre_id'=>'2'
        ]);
        DB::table('belong')->insert([
        	'entry_id'=>'1',
			'genre_id'=>'2'
        ]);
        DB::table('belong')->insert([
        	'entry_id'=>'2',
			'genre_id'=>'3'
        ]);
    }
}
