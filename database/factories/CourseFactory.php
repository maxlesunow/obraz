<?php

//use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Course::class, function () {
    $faker = Faker\Factory::create('ru_RU');

    $time_start = Carbon\Carbon::now()->addDays(rand(1, 90));
    $time_register = Carbon\Carbon::now()->subHours(rand(1, 12));
    return [
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true) ,
        'address' => $faker->address(),
        'cost' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1000, $max = 100000),
        'time_register' => $time_register,
        'time_start' => $time_start,
        'description' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true) ,
        'mini_description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'image' => '/images/blog/post-07-270x310.jpg',
        'show_home' => $faker->randomElement($array = array (true,false)),
        'meta_title' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'meta_url' => $faker->slug,
        'course_type_id' => rand(1, 5),
        'course_group_id' => rand(1, 5)
    ];

});
