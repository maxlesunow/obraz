<?php

use Illuminate\Database\Seeder;

class VerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 103; $i++) {
            DB::table('verifications')->insert([
                'code' => rand(1000, 9999),
                'wrong_pass' => rand(1, 2),
                'date_expire' => \Carbon\Carbon::now()->addMinutes(5),
                'date_send' => \Carbon\Carbon::now(),
                'type' => 'registration',
                'user_id' => $i,
            ]);
        }
    }
}
