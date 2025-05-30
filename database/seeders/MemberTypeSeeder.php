<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('member_types')->insert([
            [
                'description' => 'Student-lid',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Erelid',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Familie-lid',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
