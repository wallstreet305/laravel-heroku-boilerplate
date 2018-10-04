<?php

use Illuminate\Database\Seeder;

class DoctorSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 1,
                'doctor_id' => 1,
                'postal_code' => "46000",
                'location' => "Civil Lines, Rawalpindi,Pakistan",
                'latitude' => "33.5917",
                'longitude' => "73.0663",
                'phone_no' => "5146528",
                'time' => "11:00-16:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 2,
                'doctor_id' => 2,
                'postal_code' => "46000",
                'location' => "Civil Lines, Rawalpindi,Pakistan",
                'latitude' => "33.5306",
                'longitude' => "73.0612",
                'phone_no' => "5394285",
                'time' => "11:00-16:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 3,
                'doctor_id' => 3,
                'postal_code' => "46000",
                'location' => "Iftikhar Janjua Road, Rawalpindi, Pakistan",
                'latitude' => "33.5871591",
                'longitude' => "73.057685",
                'phone_no' => "515568787",
                'time' => "11:00-16:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 4,
                'doctor_id' => 4,
                'postal_code' => "46000",
                'location' => "Civic Center Bahria Town, Rawalpindi",
                'latitude' => "33.5494",
                'longitude' => "73.1239",
                'phone_no' => "515730330",
                'time' => "11:00-13:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 5,
                'doctor_id' => 4,
                'postal_code' => "46000",
                'location' => "Civil Lines, Rawalpindi Pakistan",
                'latitude' => "33.5917",
                'longitude' => "73.0663",
                'phone_no' => "515890433",
                'time' => "15:00-18:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 6,
                'doctor_id' => 5,
                'postal_code' => "46000",
                'location' => "Saidpur Rd, Rawalpindi, Pakistan",
                'latitude' => "33.6441",
                'longitude' => "73.0638",
                'phone_no' => "514570742",
                'time' => "13:00-17:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 7,
                'doctor_id' => 5,
                'postal_code' => "46000",
                'location' => "Benazir Bhutto Rd, Chandni chowk, Rawalpindi Pakistan",
                'latitude' => "33.6313",
                'longitude' => "73.0726",
                'phone_no' => "32591427",
                'time' => "18:00-20:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 8,
                'doctor_id' => 6,
                'postal_code' => "46000",
                'location' => "Benazir Bhutto Rd, Chandni chowk, Rawalpindi Pakistan",
                'latitude' => "33.5808",
                'longitude' => "73.0471",
                'phone_no' => "519273423",
                'time' => "11:00-16:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 9,
                'doctor_id' => 7,
                'postal_code' => "46000",
                'location' => "Peshawar Rd, Naseerabad Rawalpindi",
                'latitude' => "33.6184075",
                'longitude' => "72.9846185",
                'phone_no' => " 518646800",
                'time' => "09:00-15:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 10,
                'doctor_id' => 8,
                'postal_code' => "46000",
                'location' => "Peshawar Rd, Naseerabad Rawalpindi",
                'latitude' => "33.6184075",
                'longitude' => "72.9846185",
                'phone_no' => " 518612300",
                'time' => "09:00-15:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 11,
                'doctor_id' => 9,
                'postal_code' => "46000",
                'location' => "Jhanda Chichi, Rawalpindi, Pakistan",
                'latitude' => "33.5908",
                'longitude' => "73.0744",
                'phone_no' => " 515417310",
                'time' => "09:00-17:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 12,
                'doctor_id' => 10,
                'postal_code' => "46000",
                'location' => "Tench Bhata Rawalpindi, Pakistan",
                'latitude' => "33.5846",
                'longitude' => "73.0353",
                'phone_no' => " 515417310",
                'time' => "09:00-17:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 13,
                'doctor_id' => 10,
                'postal_code' => "46000",
                'location' => "Saidpur Road، Asghar Mall Scheme, Rawalpindi",
                'latitude' => "33.6314806",
                'longitude' => "73.0623647",
                'phone_no' => " 518877665",
                'time' => "18:30-21:00",
            ]
        );

        ////**************** OLd Records ****************///
        DB::table('doctor_schedules')->insert(

            [
                'schedule_id' => 14,
                'doctor_id' => 11,
                'postal_code' => "46000",
                'location' => "Saidpur Road، Asghar Mall Scheme, Rawalpindi",
                'latitude' => "33.6314806",
                'longitude' => "73.0623647",
                'phone_no' => "88776655",
                'time' => "11:00-16:00",
            ]
        );
        DB::table('doctor_schedules')->insert(

            [
                'schedule_id' => 15,
                'doctor_id' => 12,
                'postal_code' => "46000",
                'location' => "Saddar, Opposite AFIC, Rawalpindi",
                'latitude' => "33.6314806",
                'longitude' => "73.0623647",
                'phone_no' => "234523234",
                'time' => "13:00-17:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 16,
                'doctor_id' => 13,
                'postal_code' => "46000",
                'location' => "Peshawar Road, Cantt, Rawalpindi",
                'latitude' => "33.5983",
                'longitude' => "73.0438",
                'phone_no' => "514983433",
                'time' => "11:00-15:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 17,
                'doctor_id' => 14,
                'postal_code' => "46000",
                'location' => "Civic Center Bahria Town, Rawalpindi",
                'latitude' => "33.5494",
                'longitude' => "73.1239",
                'phone_no' => "511189062",
                'time' => "10:15-12:00"
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 18,
                'doctor_id' => 15,
                'postal_code' => "46000",
                'location' => "Civic Center Bahria Town, Rawalpindi",
                'latitude' => "33.5494",
                'longitude' => "73.1239",
                'phone_no' => "543678900",
                'time' => "11:15-15:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 19,
                'doctor_id' => 16,
                'postal_code' => "46000",
                'location' => "Tamiz-ud Din Road, CMH Rd, Rawalpindi",
                'latitude' => "33.5808",
                'longitude' => "73.0471",
                'phone_no' => "568972300",
                'time' => "12:30-16:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 20,
                'doctor_id' => 17,
                'postal_code' => "46000",
                'location' => "Phase 4, Bahria Town, Rawalpindi",
                'latitude' => "33.5917",
                'longitude' => "73.0663",
                'phone_no' => "5487640",
                'time' => "09:00-14:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 21,
                'doctor_id' => 18,
                'postal_code' => "46000",
                'location' => "Holy Family Hospital, Rawalpindi.",
                'latitude' => "33.6407",
                'longitude' => "73.0574",
                'phone_no' => "54430987",
                'time' => "12:30-14:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 22,
                'doctor_id' => 19,
                'postal_code' => "46000",
                'location' => "Satellite Town Sadiqabad Road Rawalpindi",
                'latitude' => "33.6333117",
                'longitude' => "73.0778284",
                'phone_no' => "514573716",
                'time' => "12:00-19:00",
            ]
        );
        DB::table('doctor_schedules')->insert(
            [
                'schedule_id' => 23,
                'doctor_id' => 20,
                'postal_code' => "46000",
                'location' => "Mall road, Rawalpindi, Pakistan",
                'latitude' => "33.5936",
                'longitude' => "73.0508",
                'phone_no' => "032112340",
                'time' => "09:00-19:00",
            ]
        );
    }
}
