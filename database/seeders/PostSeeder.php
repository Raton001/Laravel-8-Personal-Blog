<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['user_id'=>1, 'title'=>"post one title", 'content'=>"post one content"],
            ['user_id'=>1, 'title'=>"post two title", 'content'=>"post two content"],
        ]);
    }
}
