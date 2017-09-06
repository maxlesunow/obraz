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

$factory->define(App\Verification::class, function () {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'code' => $faker->numerify('####'),
        'wrong_pass' => rand(1,2),
        'date_expire' => $faker->dateTime('now'),
    ];
});
