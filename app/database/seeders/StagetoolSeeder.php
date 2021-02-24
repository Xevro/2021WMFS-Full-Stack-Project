<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StagetoolSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('companies')->insert([
            'email' => "company@comp.com",
            'password' => 'azerty123',
            'KBO_number' => 1,
            'full_name' => "Company name",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'name' => 'joris Maervoet',
            'email' => 'joris.maervoet@odisee.be',
            'password' => 'azerty123',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students')->insert([
            'email' => 'student@student.odisee.be',
            'password' => 'azerty123',
            'approved' => 'not approved',
            'preference' => 0,
            'completed_days' => 0,
            'mentor_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('proposals')->insert([
            'proposal_status' => 0,
            'description' => 'een stage tool ontwikkelen.',
            'period' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'not approved',
            'contract_file_location' => '/',
            'companies_id_company' => 1,
            'mentor_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('activities')->insert([
            'activity' => 'Vandaag de migrations en seeder geschreven',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'student_id_student' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('traineeship_days')->insert([
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'student_id_student' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students_has_proposals')->insert([
            'student_id' => 1,
            'proposal_id' => 1,
        ]);
    }
}
