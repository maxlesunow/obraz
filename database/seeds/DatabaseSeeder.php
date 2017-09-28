<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //        Роли
        DB::table('roles')->insert([
            'name' => 'admin',
            'name_ru' => 'Администратор',
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
            'name_ru' => 'Пользователь',
        ]);

        DB::table('verifications')->insert([
            'code' => '1111',
            'wrong_pass' => 0,
            'date_expire' => '2017-01-01 00:00',
        ]);


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
            'verification_id' => 1,
        ]);

        //        Верификация
        $this->call(VerificationSeeder::class);


        //        Пользователи
        $this->call(UserSeeder::class);

        //        Докладчики
        $this->call(SpeakerSeeder::class);

        //        Группы курсов
        $this->call(CourseGroupSeeder::class);

        //        Типы курсов
        $this->call(CourseTypeSeeder::class);

        //        Курсы
        $this->call(CourseSeeder::class);

        //        Курсы - Докладчики
        for ($i = 1; $i <= 100; $i++) {
            DB::table('course_speaker')->insert([
                'speaker_id' => rand(1,100),
                'course_id' => $i
            ]);
        }

        //        Типы оплаты
        $this->call(PaymentTypeSeeder::class);

        //        Заявки
        $this->call(ReservationSeeder::class);

        //        Оплаты
        $this->call(PaymentSeeder::class);

        //        Отзывы
        $this->call(ReviewSeeder::class);

        //        Страницы
        $this->call(PageSeeder::class);
    }
}
