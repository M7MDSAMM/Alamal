<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            SettingSeeder::class,
        ]);

        $faker = Faker::create();

        // Generate 50 dummy records
        for ($i = 0; $i < 50; $i++) {
            DB::table('admins')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'type' => $faker->randomElement(['system-manager', 'hospital-manager', 'doctors-manager', 'doctor', 'Reception']),
                'specialty' => $faker->optional(0.5)->randomElement(['Oncology', 'Radiation Oncology', 'Surgical Oncology', 'Pediatric Oncology', 'Hematology']),
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // You can set any default password here.
                'last_seen' => $faker->dateTimeThisYear(),
                'image' => null, // You can set a default image path here if you have any.
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $doctorIds = DB::table('admins')->pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'age' => $faker->numberBetween(18, 70),
                'phone_number' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['male', 'female']),
                'date_of_birth' => $faker->date,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'main_patient_file' => null, // You can set a default file path here if needed.
                'section' => $faker->randomElement(['unclassified', 'Oncology', 'Radiation Oncology', 'Surgical Oncology', 'Pediatric Oncology', 'Hematology']),
                'degrees_of_severity' => $faker->randomElement(['Mild', 'Moderate', 'Severe']),
                'diagnosis' => $faker->sentence,
                'password' => Hash::make('password'), // You can set any default password here.
                'doctor_id' => $faker->randomElement($doctorIds),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $patientIds = DB::table('users')->pluck('id')->toArray();

        // Generate 50 dummy records
        for ($i = 0; $i < 500; $i++) {
            DB::table('patient_files')->insert([
                'file' => $faker->word,
                'type' => $faker->randomElement(['Medical', 'Prescription', 'Lab Report', 'Insurance', 'Other']),
                'patient_id' => $faker->randomElement($patientIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $patientIds = DB::table('users')->pluck('id')->toArray();
        $doctorIds = DB::table('admins')->pluck('id')->toArray();

        // Generate 30 dummy records
        for ($i = 0; $i < 500; $i++) {
            DB::table('patient_appoinments')->insert([
                'appointment_date' => $faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                'appointment_time' => $faker->time('H:i:s'),
                'type' => $faker->randomElement(['Urgent', 'Normal']),
                'status' => $faker->optional(0.8, 'pending')->randomElement(['accepted', 'rejected']),
                'doctor_notes' => $faker->optional(0.5)->paragraph,
                'reason' => $faker->optional(0.8)->paragraph,
                'patient_id' => $faker->randomElement($patientIds),
                'doctor_id' => $faker->randomElement($doctorIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $patientIds = DB::table('users')->pluck('id')->toArray();
        $doctorIds = DB::table('admins')->pluck('id')->toArray();

        // Generate 40 dummy records
        for ($i = 0; $i < 500; $i++) {
            DB::table('medical_consultations')->insert([
                'message' => $faker->paragraph,
                'file' => $faker->optional(0.5)->word,
                'reply_message' => $faker->optional(0.8)->paragraph,
                'reply_file' => $faker->optional(0.5)->word,
                'patient_id' => $faker->randomElement($patientIds),
                'doctor_id' => $faker->randomElement($doctorIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
