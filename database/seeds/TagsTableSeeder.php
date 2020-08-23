<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Frame Work',
            'slug' => 'frame_work' ,
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Coding',
            'slug' => 'coding' ,
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Testing',
            'slug' => 'testing' ,
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Laravel',
            'slug' => 'laravel' ,
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Back End',
            'slug' => 'back_end' ,
        ]);
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            'name' => 'Front End',
            'slug' => 'front_end' ,
        ]);
    }
}
