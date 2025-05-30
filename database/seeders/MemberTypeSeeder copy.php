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
        DB::table('member_type_discounts')->insert([
            [
                'category' => 'Jeugd',
                'range' => '0-7',
                'discount_percentage' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Aspirant',
                'range' => '8-12',
                'discount_percentage' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Junior',
                'range' => '13-17',
                'discount_percentage' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Senior',
                'range' => '18-50',
                'discount_percentage' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Oudere',
                'range' => '51-120', // Maximum age for older members
                'discount_percentage' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
