<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Frame Work',
            'slug' => 'frame_work' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Coding',
            'slug' => 'coding' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Testing',
            'slug' => 'testing' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Laravel',
            'slug' => 'laravel' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Back End',
            'slug' => 'back_end' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Front End',
            'slug' => 'front_end' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Vue',
            'slug' => 'vue' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Angular',
            'slug' => 'angular' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Spring Boot',
            'slug' => 'spring_boot' ,
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Go Lang',
            'slug' => 'go_lang' ,
        ]);
    }
}
