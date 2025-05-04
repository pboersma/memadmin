<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('families')->insert([
            [
                'name' => 'Smith',
                'address' => '123 Main St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Johnson',
                'address' => '456 Elm St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Williams',
                'address' => '789 Oak St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Brown',
                'address' => '101 Pine St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Davis',
                'address' => '202 Maple St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
