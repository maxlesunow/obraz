<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([

            'phone' => '8 (800) 555-35-35',
            'address' => 'г.Белгород, ул. Толстого, д. 55',
            'email' => 'info@obraz-consulting.ru',
            'vk_url' => 'http://vk.com/',
            'fb_url' => 'http://vk.com/',
            'ok_url' => 'http://vk.com/',
            'instagram_url' => 'http://vk.com/',
            'twitter_url' => 'http://vk.com/',
        ]);

    }
}
