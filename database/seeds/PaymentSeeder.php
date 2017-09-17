<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 1; $i <= 100; $i++) {
            DB::table('payments')->insert([
                'reservation_id' => rand(1,100),
                'number_document' => str_random(10),
                'total' => $faker->randomElement([15000,25000,50000,100000]),
            ]);
        }
    }
}
