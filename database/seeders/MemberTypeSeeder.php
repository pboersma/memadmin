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
                'description' => 'Jeugd',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Aspirant',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Junior',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Senior',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Oudere',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
