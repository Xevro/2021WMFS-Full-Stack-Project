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
            'KBO_number' => 18272,
            'name' => "BVBA IT consulent",
            'website' => "company.com",
            'amount_proposals' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('companies')->insert([
            'email' => "hr@fleetmaster.com",
            'password' => 'azerty123',
            'KBO_number' => 1928273,
            'name' => "Fleetmaster",
            'website' => "fleetmaster.com",
            'amount_proposals' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'firstname' => 'joris',
            'lastname' => 'Maervoet',
            'email' => 'joris.maervoet@odisee.be',
            'password' => 'azerty123',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('mentors')->insert([
            'firstname' => 'Sven',
            'lastname' => 'Knockaert',
            'email' => 'sven.knockaert@odisee.be',
            'password' => 'azerty123',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students')->insert([
            'firstname' => 'Louis',
            'lastname' => 'D\'Hont',
            'email' => 'student@student.odisee.be',
            'password' => 'azerty123',
            'approved' => 'not approved',
            'preference_proposal' => 0,
            'completed_days' => 0,
            'mentor_id' => 1,
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
            'amount_likes' => 0,
            'company_id' => 1,
            'mentor_id' => 1,
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
            'amount_likes' => 0,
            'company_id' => 2,
            'mentor_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('activities')->insert([
            'activity' => 'Vandaag de migrations en seeder geschreven',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'student_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('traineeship_days')->insert([
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'student_id' => 1,
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
    }
}
