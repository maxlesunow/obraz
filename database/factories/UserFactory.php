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

$factory->define(App\User::class, function () {
    static $password;
    $faker = Faker\Factory::create('ru_RU');
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'middle_name' => 'Отчествович',
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->numerify('7##########'),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'is_verification' => $faker->randomElement($array = array (true,false)),
        'role_id' => 2,
    ];
});
