<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Repositories\ContributionRepository;

class ContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contributionRepository = new ContributionRepository();

        $memberTypes = DB::table('member_types')->get();
        $fiscalYears = DB::table('fiscal_years')->get();
        $discounts = DB::table('discounts')->get();

        foreach ($memberTypes as $memberType) {
            foreach ($fiscalYears as $fiscalYear) {
                for ($age = 1; $age <= 120; $age++) {
                    $rule = $discounts->first(function ($d) use ($age) {
                        return $age >= $d->min_age && $age <= $d->max_age;
                    });

                    $discount = $rule?->discount ?? 0;
                    $amount = 100 - $discount;

                    $contributionRepository->create([
                        'age' => $age,
                        'member_type' => $memberType->description,
                        'member_type_id' => $memberType->id,
                        'fiscal_year_id' => $fiscalYear->id,
                        'amount' => $amount,
                    ]);
                }
            }
        }
    }
}
