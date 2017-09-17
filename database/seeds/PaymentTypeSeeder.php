<?php

use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            'name' => 'Наличные',
            'is_online' => false
        ]);

        DB::table('payment_types')->insert([
            'name' => 'Расчетный счет',
            'is_online' => false
        ]);

        DB::table('payment_types')->insert([
            'name' => 'Яндекс.Деньги (онлайн)',
            'is_online' => true,
            'type_code' => '123'
        ]);

        DB::table('payment_types')->insert([
            'name' => 'QIWI кошелек (онлайн)',
            'is_online' => true,
            'type_code' => '123'
        ]);

        DB::table('payment_types')->insert([
            'name' => 'Банковская карта (онлайн)',
            'is_online' => true,
            'type_code' => '123'
        ]);
    }
}
