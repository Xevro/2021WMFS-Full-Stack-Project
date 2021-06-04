<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StagetoolSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'email' => 'joris.maervoet@odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'mentor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'email' => 'sven.knockaert@odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'coordinator',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => "company@comp.com",
            'password' => Hash::make('Azerty123'),
            'role' => 'company',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => "hr@fleetmaster.com",
            'password' => Hash::make('Azerty123'),
            'role' => 'company',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => 'louis.dhont@student.odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'student',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => 'guido.pallemans@student.odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'student',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => 'johan.donne@odisee.be',
            'password' => Hash::make('Azerty123'),
            'role' => 'mentor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('companies')->insert([
            'user_id' => 3,
            'kbo_number' => "03912.349.292",
            'name' => "BVBA E&Y",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('companies')->insert([
            'user_id' => 4,
            'kbo_number' => "0192.482.192",
            'name' => "Fleetmaster",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'user_id' => 1,
            'firstname' => 'Joris',
            'lastname' => 'Maervoet',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'user_id' => 2,
            'firstname' => 'Sven',
            'lastname' => 'knockaert',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'user_id' => 7,
            'firstname' => 'Johan',
            'lastname' => 'Donne',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students')->insert([
            'user_id' => 5,
            'firstname' => 'Louis',
            'lastname' => 'D\'Hont',
            'r_number' => 'r1039382',
            'allowed' => 1,
            'approved' => 'not approved',
            'proposal_id' => 0,
            'completed_days' => 0,
            'mentor_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students')->insert([
            'user_id' => 6,
            'firstname' => 'Guido',
            'lastname' => 'Pallemans',
            'r_number' => 'r0284739',
            'allowed' => 1,
            'approved' => 'not approved',
            'proposal_id' => 0,
            'completed_days' => 0,
            'mentor_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 0,
            'status' => 'In afwachting',
            'description' => 'een stage tool ontwikkelen.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => Carbon::now()->format('Y-m-d'),
            'contract_file_location' => '/',
            'company_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 1,
            'status' => 'Goedgekeurd',
            'description' => 'een stage tool ontwikkelen voor studenten.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => Carbon::now()->format('Y-m-d'),
            'contract_file_location' => '/',
            'company_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'visibility' => 0,
            'status' => 'In afwachting',
            'description' => 'een stage tool ontwikkelen.',
            'start_period' => Carbon::now()->format('Y-m-d'),
            'end_period' => Carbon::now()->format('Y-m-d'),
            'contract_file_location' => '/',
            'company_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tasks')->insert([
            'task' => 'Vandaag de migrations en seeder geschreven',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'student_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tasks')->insert([
            'task' => 'Een serverfout gefixed in de seeder',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'student_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tasks')->insert([
            'task' => 'Een nieuwe API gebouwd',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'student_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('likes')->insert([
            'student_id' => 1,
            'proposal_id' => 1,
        ]);

        DB::table('likes')->insert([
            'student_id' => 1,
            'proposal_id' => 2,
        ]);

        DB::table('likes')->insert([
            'student_id' => 2,
            'proposal_id' => 1,
        ]);
    }
}
