<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [

                
                [
                    'name' => 'John',
                    'l_name' => 'Smith',
                    'email' => Str::random(10).'@gmail.com',
                    'phone' => 12345678,
                    'street' => 'Peace Park 1',
                    'city' => 'New York',
                    'zip' => '123876',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                    
                ],
                [
                    'name' => 'Wang',
                    'l_name' => 'Jin',
                    'email' => Str::random(10).'@gmail.com',
                    'phone' => 12345678,
                    'street' => 'Peace Park 2',
                    'city' => 'New York',
                    'zip' => '123876',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Eric',
                    'l_name' => 'Ronas',
                    'email' => Str::random(10).'@gmail.com',
                    'phone' => 12345678,
                    'street' => 'Peace Park 3',
                    'city' => 'New York',
                    'zip' => '123876',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
        
    }
}
