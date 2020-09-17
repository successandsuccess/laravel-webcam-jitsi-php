<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Rachel',
                    'email' => Str::random(10).'@gmail.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    'lname' => 'Green',
                    'street' => 'Lightning 12',
                    'no' => 12,
                    'city' => 'Washington',
                    'zip' => '11111',
                    'insurance_carrier' => 'ambulance bus',
                    'insurance_phone' => 12345678,
                    'group' => 'patient',
                    'policy_id' => 1728392,
                    'phone' => 8766521,
                    'prov_id_1' => 1,
                    'prov_id_2' => 2,
                    'prov_id_3' => 3,
                    'dx_1' => 1,
                    'dx_2' => 2,
                    'dx_3' => 3,
                    'dx_4' => 4,
                    'dx_5' => 5,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
