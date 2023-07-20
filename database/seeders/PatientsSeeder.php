<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'age' => $faker->numberBetween(18, 60),
                'phone_number' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['male', 'female']),
                'date_of_birth' => $faker->date,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'main_patient_file' => null,
                'section' => $faker->randomElement(['unclassified', 'Oncology', 'Radiation Oncology', 'Surgical Oncology', 'Pediatric Oncology', 'Hematology']),
                'degrees_of_severity' => $faker->randomElement(['Mild', 'Moderate', 'Severe']),
                'diagnosis' => $faker->sentence,
                'password' => Hash::make('password'),
                'doctor_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
