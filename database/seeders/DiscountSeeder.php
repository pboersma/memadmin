<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discounts')->insert([
            [
                'category' => 'Jeugd',
                'min_age' => 0,
                'max_age' => 7,
                'discount' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Aspirant',
                'min_age' => 8,
                'max_age' => 12,
                'discount' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Junior',
                'min_age' => 13,
                'max_age' => 17,
                'discount' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Senior',
                'min_age' => 18,
                'max_age' => 50,
                'discount' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category' => 'Oudere',
                'min_age' => 51,
                'max_age' => 120,
                'discount' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
