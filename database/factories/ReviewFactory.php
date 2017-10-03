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

$factory->define(App\Review::class, function () {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'status' => $faker->randomElement($array = array (true,false)),
        'show_home' => $faker->randomElement($array = array (true,false)),
        'rating' => rand(1, 5),
        'date' => Carbon\Carbon::now()->addDays(rand(1, 90)),
        'text' => $faker->sentence($nbWords = 40, $variableNbWords = true) ,
        'user_id' => rand(1, 100)
    ];
});
