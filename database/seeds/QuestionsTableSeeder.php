<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('questions')->insert([
                'question_id' => 1,
                'description' => "Did you have your first hospital appointment?",
                'week_no' => 7,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 2,
                'description' => "Please share your reference number?",
                'week_no' => 7,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 3,
                'description' => "Did you had your blood tests by Gp?",
                'week_no' => 8,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 4,
                'description' => "Did you had your blood tests by Gp 2?",
                'week_no' => 8,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 5,
                'description' => "Ask Doctor about scan",
                'week_no' => 9,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 6,
                'description' => "Ask Doctor about scan and reports",
                'week_no' => 9,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 7,
                'description' => "Is Everything going all right?",
                'week_no' => 16,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 8,
                'description' => "Ask GP about diet plan?",
                'week_no' => 16,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 9,
                'description' => "Explain Hospital appointment",
                'week_no' => 20,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 10,
                'description' => "Do ask doctor about neuchal screening",
                'week_no' => 23,
                'created_at' => now(),
            ]);
            DB::table('questions')->insert([
                'question_id' => 11,
                'description' => "ASk doctor about the scan and progress",
                'week_no' => 24,
                'created_at' => now(),
            ]);

    }
}
