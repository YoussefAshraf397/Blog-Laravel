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
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Coding',
            'slug' => 'coding' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Testing',
            'slug' => 'testing' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Laravel',
            'slug' => 'laravel' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Back End',
            'slug' => 'back_end' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Front End',
            'slug' => 'front_end' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Vue',
            'slug' => 'vue' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Angular',
            'slug' => 'angular' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Spring Boot',
            'slug' => 'spring_boot' ,
            'created_at' => now()
        ]);
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'name' => 'Go Lang',
            'slug' => 'go_lang' ,
            'created_at' => now()
        ]);
    }
}
