<?php

use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->insert([
            'name' => 'Вебинар'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Семинар'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Лекция'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Мастер-класс'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Мастер-класс + практика'
        ]);
    }
}
