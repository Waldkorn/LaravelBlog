<?php

use Illuminate\Database\Seeder;

class oldpost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => "dit is een titel",
            'body' => "dit is een blog post",
            'comments_allowed' => 1,
            'user_id' => 1,
            'created_at' => "2018-01-01 01:01:01"
        ]);
    }
}
