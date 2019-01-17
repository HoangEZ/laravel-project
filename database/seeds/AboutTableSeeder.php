<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->delete();
        DB::table('about')->insert([
            'about'=>'This is about content'
        ]);
    }
}
