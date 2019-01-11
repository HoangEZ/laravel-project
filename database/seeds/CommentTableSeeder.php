<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->delete();
        DB::table('comment')->insert([
        	'entry_id'=>1,
        	'name'=>'Tiêu Phong',
        	'image_id'=>'1',
        	'email'=>'bangchucaibang@tlbb.com',
        	'comment'=>'Không biết cmmt điều gì, chỉ một lời khen gửi tới các hạ',
        	'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('comment')->insert([
        	'entry_id'=>1,
        	'name'=>'Đoàn Dự',
        	'image_id'=>'2',
        	'email'=>'doandu@tlbb.com',
        	'comment'=>'À, chào Huynh lâu ngày nhỉ, nhậu không huynh?',
        	'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('comment')->insert([
        	'entry_id'=>1,
        	'name'=>'Lý Tầm Hoan',
        	'image_id'=>'3',
        	'email'=>'tieulyphidao@tlbb.com',
        	'comment'=>'Lâm Thi Âm ơi, ta nhớ muội',
        	'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
