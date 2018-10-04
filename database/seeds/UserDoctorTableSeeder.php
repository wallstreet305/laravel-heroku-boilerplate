<?php

use Illuminate\Database\Seeder;

class UserDoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_doctors')->insert(
            [
                'doctor_id_fk' => '1',
                'user_id_fk' => '2',
            ]
        );
        DB::table('user_doctors')->insert(
            [
                'doctor_id_fk' => '1',
                'user_id_fk' => '1',
            ]
        );
        DB::table('user_doctors')->insert(
            [
                'doctor_id_fk' => '2',
                'user_id_fk' => '3',
            ]
        );
    }
}
