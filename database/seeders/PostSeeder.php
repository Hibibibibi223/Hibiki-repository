<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('テーブル名')->insert(['カラム名' => 'データ' ] );
        DB::table('posts')->insert([
            'title' => '命名の心得',
            'body' => '命名はデータを基準に考えろ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
