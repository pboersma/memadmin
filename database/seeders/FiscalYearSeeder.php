<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiscalYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fiscal_years')->insert([
            [
                'year' => '2020',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'year' => '2021',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'year' => '2022',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'year' => '2023',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'year' => '2024',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'year' => '2025',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'year' => '2026',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
