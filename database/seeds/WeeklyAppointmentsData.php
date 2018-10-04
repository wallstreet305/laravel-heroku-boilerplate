<?php

use Illuminate\Database\Seeder;

class WeeklyAppointmentsData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('weekly_appointments')->insert(
            [
                'title' => 'First GP Appointment',
                'overview' => 'Did you have your first hospital appointment?',
                'detail' => 'Is this your first Appointment?',
                'week_no' => 7,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => 'First Hospital Appointment',
                'overview' => 'Did you have your blood tests by GP or hospital( this info should go to DB)',
                'detail' => 'Have you had your free scans from Hospital?',
                'week_no' => 8,
                'appointment_type' => 'hospital',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => 'Neuhcal screening',
                'overview' => 'Explain the scan',
                'detail' => 'Call WCH',
                'week_no' => 9,
                'appointment_type' => 'lab',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '16th week appointment',
                'overview' => 'Please make appointment call',
                'detail' => 'Have you scheduled your monthly appointment',
                'week_no' => 16,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '20th week appointment',
                'overview' => 'Please make appointment call',
                'detail' => 'Have you scheduled your monthly appointment',
                'week_no' => 20,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '28th Week Appointment',
                'overview' => 'Morphology scan',
                'detail' => 'Morphology scan',
                'week_no' => 23,
                'appointment_type' => 'lab',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '24th week appointment',
                'overview' => 'Please make appointment call',
                'detail' => 'Have you scheduled your monthly appointment',
                'week_no' => 24,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '28th week lab tests',
                'overview' => 'Please make appointment call',
                'detail' => 'Blood, GTT, RH -ve, Anemia, Vitamin Test',
                'week_no' => 28,
                'appointment_type' => 'lab',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '28th week appointment',
                'overview' => 'Please make appointment call',
                'detail' => 'You should schedule your appointment with GP and discuss your tests.',
                'week_no' => 28,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => 'Second hospital appointment',
                'overview' => 'It shoild be organized by GP, pregnancy assessment',
                'detail' => 'Schedule your 2nd visit to hospital',
                'week_no' => 28,
                'appointment_type' => 'hospital',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '30th week fortnightly visit',
                'overview' => 'Please make appointment call',
                'detail' => 'Should i schedule appointment with GP, you need to discuss about delivery?',
                'week_no' => 30,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '32nd week fortnightly visit',
                'overview' => 'Please make appointment call',
                'detail' => 'Should i schedule with GP, you need to discuss about delivery?',
                'week_no' => 32,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '34th week fortnightly visit',
                'overview' => 'Please make appointment call',
                'detail' => 'Should i schedule with GP, you need to discuss about delivery?',
                'week_no' => 34,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '36th week hospital visit',
                'overview' => 'With blood test, Haemoglobin, Antibody scan',
                'detail' => 'Should i schedule appointment for your Blood Test, Heomoglobin, Antibodies and scans?',
                'week_no' => 36,
                'appointment_type' => 'hospital',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '36th week fortnightly visit',
                'overview' => 'Please make appointment call',
                'detail' => 'Should i schedule appointment with your GP, you need to undertake Group B strep screening?',
                'week_no' => 36,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '38th week fortnightly visit',
                'overview' => 'Please make appointment call',
                'detail' => 'Should i schedule with GP, you need to discuss about delivery?',
                'week_no' => 38,
                'appointment_type' => 'gp',
            ]
        );
        DB::table('weekly_appointments')->insert(
            [
                'title' => '40th week fortnightly visit',
                'overview' => 'Please make appointment call',
                'detail' => 'Should i schedule with GP, you need to discuss about delivery?',
                'week_no' => 40,
                'appointment_type' => 'gp',
            ]
        );
    }
}
