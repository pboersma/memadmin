<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyMemberSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = [
            'Peter', 'Stefan', 'Anna', 'Lisa', 'Tom', 'Eva', 'Noah', 'Sophie',
            'Lars', 'Julia', 'Milan', 'Emma', 'Daan', 'Tess', 'Bram', 'Sara',
            'Finn', 'Lotte', 'Lucas', 'Nina', 'Joep', 'Fleur', 'Max', 'Elin',
            'Jesse', 'Roos', 'Tim', 'Mila', 'Mees', 'Luna', 'Gijs', 'Isa'
        ];

        $familyRoles = [
            'Son', 'Daughter', 'Parent', 'Other'
        ];

        $membershipTypes = [
            1,
            2,
            3,
        ];

        $families = range(1, 10);
        $members = [];
        $nameIndex = 0;

        foreach ($families as $familyId) {
            $memberCount = rand(3, 5);

            for ($i = 0; $i < $memberCount; $i++) {
                $members[] = [
                    'name' => $firstNames[$nameIndex % count($firstNames)],
                    'birthdate' => now()->subYears(rand(1, 80))->format('Y-m-d'),
                    'member_type' => $familyRoles[array_rand($familyRoles)],
                    'member_type_id' => $membershipTypes[array_rand($membershipTypes)],
                    'family_id' => $familyId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $nameIndex++;
            }
        }

        DB::table('family_members')->insert($members);
    }
}
