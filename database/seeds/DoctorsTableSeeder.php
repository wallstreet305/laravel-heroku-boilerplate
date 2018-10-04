<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert(

            [
                'doctor_id' => 1,
                'first_name' => "Brig Waqar",
                'last_name' => "Ahmed",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "English, Urdu",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 2,
                'first_name' => "Muhammad",
                'last_name' => "Ali",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "English, Urdu",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 3,
                'first_name' => "Ambreen",
                'last_name' => "Malik",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Female",
                'languages' => "English",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 4,
                'first_name' => "Bilal",
                'last_name' => "Firdous",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "Urdu, Pashto",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 5,
                'first_name' => "Sadia",
                'last_name' => "Waheed",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "English, Urdu",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 6,
                'first_name' => "Shamir",
                'last_name' => "Malik",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "English, Urdu",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 7,
                'first_name' => "Samina",
                'last_name' => "Tasleem",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Female",
                'languages' => "English, Urdu",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 8,
                'first_name' => "Col Asma",
                'last_name' => "Khalid",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Female",
                'languages' => "English, Urdu",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 9,
                'first_name' => "Azra",
                'last_name' => "Sajid",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Female",
                'languages' => "English, Urdu",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 10,
                'first_name' => "Freeha",
                'last_name' => "Zaheer",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Female",
                'languages' => "English, Urdu",
            ]
        );
        //********************* Old records **************///
        DB::table('doctors')->insert(

            [
                'doctor_id' => 11,
                'first_name' => "Rizwan",
                'last_name' => "Sultan",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "English",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 12,
                'first_name' => "Munawar",
                'last_name' => "Hussain",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "English",
            ]
        );
        DB::table('doctors')->insert(

            [
                'doctor_id' => 13,
                'first_name' => "Imran",
                'last_name' => "Ahmad",
                'title' => "Gynaecologist",
                'qualifications' => "MBBS FCPS",
                'gender' => "Male",
                'languages' => "English",
            ]
        );
        DB::table('doctors')->insert([
            'doctor_id' => 14,
            'first_name' => "SUMAIRA",
            'last_name' => "Nasim",
            'title' => "Gynaecologist",
            'qualifications' => "MBBS FCPS",
            'gender' => "Female",
            'languages' => "English",
         ]);
        DB::table('doctors')->insert([
            'doctor_id' => 15,
            'first_name' => "Aneela",
            'last_name' => "Qureshi",
            'title' => "Gynaecologist",
            'qualifications' => "MBBS FCPS",
            'gender' => "Female",
            'languages' => "English",
        ]);
        DB::table('doctors')->insert([
            'doctor_id' => 16,
            'first_name' => "Ibrahim",
            'last_name' => "Baloch",
            'title' => "Gynaecologist",
            'qualifications' => "MBBS FCPS",
            'gender' => "Female",
            'languages' => "English",
        ]);
        DB::table('doctors')->insert([
            'doctor_id' => 17,
            'first_name' => "Deeba",
            'last_name' => "Tahir",
            'title' => "Gynaecologist",
            'qualifications' => "MBBS FCPS",
            'gender' => "Female",
            'languages' => "English",
        ]);
        DB::table('doctors')->insert([
            'doctor_id' => 18,
            'first_name' => "Tabassum",
            'last_name' => "Aziz",
            'title' => "Gynaecologist",
            'qualifications' => "MBBS FCPS",
            'gender' => "Female",
            'languages' => "English",
        ]);
        DB::table('doctors')->insert([
            'doctor_id' => 19,
            'first_name' => "Salman",
            'last_name' => "Tipu",
            'title' => "Gynaecologist",
            'qualifications' => "MBBS FCPS",
            'gender' => "Female",
            'languages' => "English",
        ]);
        DB::table('doctors')->insert([
            'doctor_id' => 20,
            'first_name' => "Umar",
            'last_name' => "Zafar",
            'title' => "Gynaecologist",
            'qualifications' => "MBBS FCPS",
            'gender' => "Female",
            'languages' => "English",
        ]);
    }
}
