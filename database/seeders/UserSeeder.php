<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'secretaris',
                'email' => 'secretaris@memadmin.com',
                'password' => bcrypt('secretaris!'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'penningmeester',
                'email' => 'penningmeester@memadmin.com',
                'password' => bcrypt('penningmeester!'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'beheerder',
                'email' => 'beheerder@memadmin.com',
                'password' => bcrypt('beheerder!'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'secretaris',
                'description' => 'Beheer leden en gezinnen',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'penningmeester',
                'description' => 'Bekijk contributiebedragen',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'beheerder',
                'description' => 'Volledige toegang',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('users_roles')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
