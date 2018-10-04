<?php

use Illuminate\Database\Seeder;

class LabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('labs')->insert(

            [
                'lab_id' => 1,
                'area' => "Metropolitan",
                'suburb' => "Adelaide (136 North Terrace, Roma Mitchell House)",
                'location' => "Unit 15, 136 North Terrace Adelaide SA 5000",
                'timings' => "Mon-Fri 7:30am 12:00 noon, Sat 08:00am – 12 noon.",
                'phone' => "08 8222 3000",
                'lat' => "-34.9220048",
                'lng' => "138.5950892",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('labs')->insert(

            [
                'lab_id' => 2,
                'area' => "Metropolitan",
                'suburb' => "Adelaide (Adelaide City General Practice)",
                'location' => "2nd Floor, 29 King William St, Adelaide SA 5000",
                'timings' => "Mon-Fri 8:30am to 1:30pm",
                'phone' => "08 8222 3000",
                'lat' => "-34.922628",
                'lng' => "138.599122",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('labs')->insert(

            [
                'lab_id' => 3,
                'area' => "Metropolitan",
                'suburb' => "Adelaide (Royal Adelaide Hospital)",
                'location' => "Level 3C, Port Road, Adelaide SA 5000",
                'timings' => "Mon-Fri 7:30am to 6:00pm",
                'phone' => "08 8222 3000",
                'lat' => "-34.9209641",
                'lng' => "138.585169",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('labs')->insert(

            [
                'lab_id' => 4,
                'area' => "Metropolitan",
                'suburb' => "Aldinga (GP Plus Health Care Centre)",
                'location' => "Pridham Boulevard, Aldinga SA 5173",
                'timings' => "Mon-Fri 8.00am-12 noon, Sat 9:00 to 12:00",
                'phone' => "08 8222 3000",
                'lat' => "34.7170632",
                'lng' => "138.6692385",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('labs')->insert(

            [
                'lab_id' => 5,
                'area' => "Metropolitan",
                'suburb' => "Bedford Park (Flinders Medical Centre)",
                'location' => "Level 2 Consulting Clinics, Flinders Drive, Bedford Park SA 5042",
                'timings' => "Mon-Fri 8:00am to 5:00pm",
                'phone' => "08 8222 3000",
                'lat' => "-35.0213994",
                'lng' => "138.566866",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
