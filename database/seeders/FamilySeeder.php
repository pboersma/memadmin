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
            [
                'name' => 'Miller',
                'address' => '303 Birch St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Wilson',
                'address' => '404 Cedar St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Moore',
                'address' => '505 Walnut St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Taylor',
                'address' => '606 Chestnut St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Anderson',
                'address' => '707 Poplar St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
                        [
                'name' => 'Donn',
                'address' => '7072 Poplar St, Springfield',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
