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
                    'rx_1' => 6,
                    'rx_2' => 2,
                    'rx_3' => 3,
                    'rx_4' => 4,
                    'rx_5' => 5,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Thoracic Stenosis',
                    'dx_desc' => Str::random(40),
                    'rx_1' => 7,
                    'rx_2' => 6,
                    'rx_3' => 3,
                    'rx_4' => 4,
                    'rx_5' => 5,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Cervical Stenosis',
                    'dx_desc' => Str::random(40),
                    'rx_1' => 2,
                    'rx_2' => 3,
                    'rx_3' => 4,
                    'rx_4' => 5,
                    'rx_5' => 6,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Lumbar Trauma',
                    'dx_desc' => Str::random(40),
                    'rx_1' => 5,
                    'rx_2' => 4,
                    'rx_3' => 3,
                    'rx_4' => 2,
                    'rx_5' => 6,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Thoracic Trauma',
                    'dx_desc' => Str::random(40),
                    'rx_1' => 3,
                    'rx_2' => 2,
                    'rx_3' => 6,
                    'rx_4' => 4,
                    'rx_5' => 5,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'dx_name' => 'Cervical Trauma',
                    'dx_desc' => Str::random(40),
                    'rx_1' => 3,
                    'rx_2' => 4,
                    'rx_3' => 5,
                    'rx_4' => 6,
                    'rx_5' => 7,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
