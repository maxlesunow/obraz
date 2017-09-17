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

$factory->define(App\Reservation::class, function () {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'cost' => $faker->randomElement([15000,25000,50000,100000]),
        'status' => $faker->randomElement($array = array (true,false)),
        'payment_status' => $faker->randomElement($array = array (true,false)),
        'course_id' => rand(1, 100),
        'user_id' => rand(1, 100),
        'payment_type_id' => rand(1, 5),
    ];
});
