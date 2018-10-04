<?php

use Illuminate\Database\Seeder;

class HospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hospitals')->insert(

            [
                'hospital_id' => 1,
                'dhs_id' => "49",
                'name' => "Angaston District Hospital",
                'address' => "29 North Street",
                'suburb' => "Angaston",
                'postcode' => "5353",
                'phone' => "+61 8 8563 8500",
                'subtype' => "Public Acute",
                'lat' => "-34.9220048",
                'lng' => "171.5950892",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('hospitals')->insert(

            [
                'hospital_id' => 2,
                'dhs_id' => "4401",
                'name' => "Ardrossan Community Hospital Inc",
                'address' => "37 Fifth Street",
                'suburb' => "Ardrossan",
                'postcode' => "5571",
                'phone' => "+61 8 8837 3021",
                'subtype' => "Private Acute",
                'lat' => "-34.9220048",
                'lng' => "171.5950892",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('hospitals')->insert(

            [
                'hospital_id' => 3,
                'dhs_id' => "4302",
                'name' => "Ashford Hospital",
                'address' => "55 Anzac Highway",
                'suburb' => "Ashford",
                'postcode' => "5035",
                'phone' => "+61 8 8375 5222",
                'subtype' => "Private Acute",
                'lat' => "-34.9220048",
                'lng' => "171.5950892",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('hospitals')->insert(

            [
                'hospital_id' => 4,
                'dhs_id' => "52",
                'name' => "Balaklava Soldiers' Memorial District Hospital",
                'address' => "16 War Memorial Drive",
                'suburb' => "Balaklava",
                'postcode' => "5461",
                'phone' => "+61 8 8862 1400",
                'subtype' => "Public Acute",
                'lat' => "-34.9220048",
                'lng' => "171.5950892",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
