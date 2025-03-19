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
                'name' => 'Smith Family',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Johnson Family',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Williams Family',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Brown Family',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Davis Family',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
