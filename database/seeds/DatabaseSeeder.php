<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ImageTableSeeder::class);
    	$this->call(UserTableSeeder::class);
        $this->call(EntryTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(BelongTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        
    }
}
