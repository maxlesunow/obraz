<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        Админ
        DB::table('users')->insert([
            'first_name' => 'Админов',
            'last_name' => 'Админ',
            'middle_name' => 'Админович',
            'email' => 'admin@admin.admin',
            'phone' => '71234567890',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
            'role_id' => 1,
            'is_verification' => true,
        ]);

        //        User 1
        DB::table('users')->insert([
            'first_name' => 'Пригорнев',
            'last_name' => 'Иван',
            'middle_name' => 'Андреевич',
            'email' => 'v1ar31@gmail.com',
            'phone' => '79056718961',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
            'role_id' => 2,
            'is_verification' => true,
        ]);

        //        User 2
        DB::table('users')->insert([
            'first_name' => 'Лесунов',
            'last_name' => 'Максим',
            'middle_name' => 'Егорович',
            'email' => 'maxlesunow@gmail.com',
            'phone' => '79205974694',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
            'role_id' => 2,
            'is_verification' => true,
        ]);

        factory(App\User::class, 100)->create();
    }
}
