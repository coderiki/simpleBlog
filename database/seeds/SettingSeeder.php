<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'homeTitle' => 'Blog',
            'postInCategoryPaginateCount' => 10,
            'postInHomePaginateCount' => 10,
            'postInTagPaginateCount' => 10,
            'commentInPostCount' => 10,
            'commentDefaultStatus' => 0,
            'commentabilityStatus' => 1,
            'postDefaultImage' => 'image/web/no-image-min.png'
        ]);
    }
}
