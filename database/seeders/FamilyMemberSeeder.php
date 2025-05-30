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
                'name' => 'Peter',
                'birthdate' => '1990-01-01',
                'member_type' => 'Father',
                'member_type_id' => 1,
                'family_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Stefan',
                'birthdate' => '1995-01-01',
                'member_type' => 'Son',
                'member_type_id' => 3,
                'family_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
