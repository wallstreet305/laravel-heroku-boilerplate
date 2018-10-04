<?php

use Illuminate\Database\Seeder;

class FaqCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('faq_categories')->insert(
            [
                'category_id' => 1,
                'category_name' => "First Appointment with GP",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_categories')->insert(
            [
                'category_id' => 2,
                'category_name' => "Investigations during pregnancy",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_categories')->insert(
            [
                'category_id' => 3,
                'category_name' => "Travelling  during pregnancy",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_categories')->insert(
            [
                'category_id' => 4,
                'category_name' => "Health and well-being during pregnancy",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
