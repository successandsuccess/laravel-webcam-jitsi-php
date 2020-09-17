<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rxs')->insert(
            [
                [
                    'rx_name' => 'Upper Back Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/vuGnzLxRvZM',
                    'rx_note' => 'for Upper Back exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'SI Joint Extensions',
                    'rx_link' => 'https://www.youtube.com/embed/mTFxY_HS8OM',
                    'rx_note' => 'For knee Joint exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lumbar Stenosis Stretches',
                    'rx_link' => 'https://www.youtube.com/embed/XLLBYnVtMcE',
                    'rx_note' => 'For Lumbar stress releasing exercises',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
