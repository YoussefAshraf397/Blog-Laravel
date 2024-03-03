<?php

use App\Enums\FeedTypeEnum;
use App\Models\Feed;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * List of applications to add.
     */


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $feeds = [
            [
                'title_en' => 'About Us',
                'title_ar' => 'معلومات عنا',
                'description_en' => 'About us description',
                'description_ar' => 'وصف عنا',
                'type' => FeedTypeEnum::ABOUT,
            ]
        ];

        foreach ($feeds as $feed) {
            Feed::create([
                'title' => json_encode([
                    'en' => $feed['title_en'],
                    'ar' => $feed['title_ar']
                ]),
                'description' => json_encode([
                    'en' => $feed['description_en'],
                    'ar' => $feed['description_ar']
                ]),
                'type' => $feed['type']
            ]);
        }
    }

}
