<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('family_members')->insert([
            [
                'name' => 'Peter Smith',
                'birthdate' => '1990-01-01',
                'relation_type' => 'Father',
                'family_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Stefan Johnson',
                'birthdate' => '1995-01-01',
                'relation_type' => 'Son',
                'family_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
