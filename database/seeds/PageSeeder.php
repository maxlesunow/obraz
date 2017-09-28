<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'type' => 'home',
            'title' => 'Главная страница',
            'text' => 'Текст',
            'meta_title' => 'meta_title',
            'meta_description' => 'meta_description',
            'meta_keywords' => 'meta_keywords',
            'meta_url' => '',
        ]);

        DB::table('pages')->insert([
            'type' => 'about',
            'title' => 'О компании',
            'text' => 'Текст',
            'meta_title' => 'meta_title',
            'meta_description' => 'meta_description',
            'meta_keywords' => 'meta_keywords',
            'meta_url' => '',
        ]);

        DB::table('pages')->insert([
            'type' => 'schedule',
            'title' => 'Расписание курсов',
            'text' => 'Текст',
            'meta_title' => 'meta_title',
            'meta_description' => 'meta_description',
            'meta_keywords' => 'meta_keywords',
            'meta_url' => '',
        ]);

        DB::table('pages')->insert([
            'type' => 'contact',
            'title' => 'Контакты',
            'text' => 'Текст',
            'meta_title' => 'meta_title',
            'meta_description' => 'meta_description',
            'meta_keywords' => 'meta_keywords',
            'meta_url' => '',
        ]);

    }
}
