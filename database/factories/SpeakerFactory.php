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

$factory->define(App\Speaker::class, function () {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'middle_name' => 'Отчествович',
        'description' => $faker->randomHtml(2,3) ,
        'meta_title' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'meta_url' => $faker->slug
    ];
});
