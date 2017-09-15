<?php

use Illuminate\Database\Seeder;

class CourseGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_groups')->insert([
            'name' => 'Стоматология'
        ]);

        DB::table('course_groups')->insert([
            'name' => 'Маникюр'
        ]);

        DB::table('course_groups')->insert([
            'name' => 'Ресницы'
        ]);

        DB::table('course_groups')->insert([
            'name' => 'Педикюр'
        ]);

        DB::table('course_groups')->insert([
            'name' => 'Окрашивание'
        ]);
    }
}
