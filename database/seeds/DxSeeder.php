<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dxs')->insert(
            [
                [
                    'dx_name' => 'Lumbar Stenosis',
                    'dx_desc' => Str::random(40),
                    
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Thoracic Stenosis',
                    'dx_desc' => Str::random(40),
                    
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Cervical Stenosis',
                    'dx_desc' => Str::random(40),
                   
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Lumbar Trauma',
                    'dx_desc' => Str::random(40),
                  
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Thoracic Trauma',
                    'dx_desc' => Str::random(40),
                   
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Cervical Trauma',
                    'dx_desc' => Str::random(40),
                    
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
