#/bin/sh

php artisan db:seed --class=UserSeeder
php artisan db:seed --class=DiscountSeeder
php artisan db:seed --class=FiscalYearSeeder
php artisan db:seed --class=MemberTypeSeeder
php artisan db:seed --class=FamilySeeder
php artisan db:seed --class=FamilyMemberSeeder
