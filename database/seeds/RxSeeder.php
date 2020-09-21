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
                    'rx_name' => 'Pelvic Tilt',
                    'rx_link' => 'https://www.youtube.com/embed/6BhPhO4ZXNA',
                    'rx_note' => 'When abdominal muscles are not performing, the muscles of the lower back have to work harder to stabilize your body. The pelvic tilt is a gentle method of improving core stability at home.',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'rx_desc' => 'Core stability exercise',
                    'frequency' => '3x week',
                    'duration' => '3 sets of 10',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Lunging Hip Flexor Stretch',
                    'rx_link' => 'https://www.youtube.com/embed/jbj6MeoQkcI',
                    'rx_note' => 'The lumbar spine continues into the hips. When the hip flexors become tight, mobility in the lower back can become constricted. Try this stretch to open up the hips.',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'rx_desc' => 'Hip opening stretch',
                    'frequency' => 'Daily',
                    'duration' => '5 stretches, hold for 30 seconds',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Knee to Chest Stretch',
                    'rx_link' => 'https://www.youtube.com/embed/0b1hvGonOdk',
                    'rx_note' => 'The piriformis muscle is located in the buttocks, but is often responsible for causing shooting pain through the legs and lower back. A gentle and effective stretch for this muscle is the knee to chest stretch.',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'rx_desc' => 'Low back stretch',
                    'frequency' => 'Daily',
                    'duration' => '5 stretches, hold for 30 seconds',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Prayer Stretch',
                    'rx_link' => 'https://www.youtube.com/embed/2C6gQnGQ_pM',
                    'rx_note' => 'Finish your set of exercises for lower back pain with the prayer stretch. This position specifically targets the muscles of the lower back, helping to lengthen them and alleviate pain.',
                    'dx_no' => 1,
                    'type' => 'Video',
                    'rx_desc' => 'Low back stretch',
                    'frequency' => 'Daily',
                    'duration' => '5 stretches, hold for 30 seconds',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Cobra Stretch',
                    'rx_link' => 'https://www.youtube.com/embed/jwoTJNgh8BY',
                    'rx_note' => 'The cobra stretch is one of the best exercises to help relieve tension from the mid-back section. You can also work your way up to the complete stretch as your spine gains more flexibility and strength.',
                    'dx_no' => 2,
                    'type' => 'Video',
                    'rx_desc' => 'Mid back stretch',
                    'frequency' => 'Daily',
                    'duration' => '5 stretches, hold for 30 seconds',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Cat-Cow Stretch',
                    'rx_link' => 'https://www.youtube.com/embed/tT00XNqJ3uA',
                    'rx_note' => 'The cat-cow stretch is not only a favorite among chiropractic back pain exercises, but it’s also a common yoga position to improve flexibility in the spine.',
                    'dx_no' => 2,
                    'type' => 'Video',
                    'rx_desc' => 'Mid back stretch',
                    'frequency' => 'Daily',
                    'duration' => '5 stretches, hold for 30 seconds',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Spinal Twist',
                    'rx_link' => 'https://www.youtube.com/embed/mNdJti7ZwKI',
                    'rx_note' => 'Spinal twists help to elongate the middle back. They’re great for releasing accumulated tension that tends to develop in this area. You will need a mat to perform this stretch.',
                    'dx_no' => 2,
                    'type' => 'Video',
                    'rx_desc' => 'Mid back stretch',
                    'frequency' => 'Daily',
                    'duration' => '5 stretches, hold for 30 seconds',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Bridge Stretch',
                    'rx_link' => 'https://www.youtube.com/embed/-5nJtvt7la0',
                    'rx_note' => 'The bridge stretch strengthens and opens the back. However, it does place slight pressure on the neck, so be mindful if your cervical spine has been experiencing pain or inflammation lately.',
                    'dx_no' => 2,
                    'type' => 'Video',
                    'rx_desc' => 'Mid back stretch',
                    'frequency' => 'Daily',
                    'duration' => '5 stretches, hold for 30 seconds',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Forward and Backward Neck Tilt',
                    'rx_link' => 'https://www.youtube.com/embed/6C-wfV27bzI',
                    'rx_note' => 'This neck pain stretch can be done standing or seated, meaning you can even exercise sore neck muscles while at work.',
                    'dx_no' => 3,
                    'type' => 'Video',
                    'rx_desc' => 'Neck stretch',
                    'frequency' => '3x week',
                    'duration' => '3 sets of 10',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Side Neck Tilt',
                    'rx_link' => 'https://www.youtube.com/embed/T2ZrFJqgG3w',
                    'rx_note' => 'This neck pain stretch applies the same concept as the forward and backward tilt, but side to side instead. It can also be completed standing or seated.',
                    'dx_no' => 3,
                    'type' => 'Video',
                    'rx_desc' => 'Neck stretch',
                    'frequency' => '3x week',
                    'duration' => '3 sets of 10',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Downward Neck Release',
                    'rx_link' => 'https://www.youtube.com/embed/V9j5JkWGwI8',
                    'rx_note' => 'The downward neck release exercise can also be done sitting or standing. However, you may have an easier time completing this exercise on a stool without a back or while standing.',
                    'dx_no' => 3,
                    'type' => 'Video',
                    'rx_desc' => 'Neck stretch',
                    'frequency' => '3x week',
                    'duration' => '3 sets of 10',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'rx_name' => 'Shoulder Roll',
                    'rx_link' => 'https://www.youtube.com/embed/_HK_Kf-4wxU',
                    'rx_note' => 'Unlike other chiropractor-approved neck pain stretches, the shoulder roll is best done standing.',
                    'dx_no' => 3,
                    'type' => 'Video',
                    'rx_desc' => 'Neck stretch',
                    'frequency' => '3x week',
                    'duration' => '3 sets of 10',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
