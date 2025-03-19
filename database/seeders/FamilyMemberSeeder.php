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
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Stefan Johnson',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
