<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Down Syndrome Course',
            'videos_number' => '9',
            'descreption' => 'This Course Helping people how care about Down Syndrome such as (perants,teachers,gardians)',
            'image_path' => 'Down_Syndrome_Course.jpg',
            'price' => '480',
            'stripe_id' => 'price_1LB8ceGHrEGTh2jDgvcJiRkJ',

        ]);
        Course::create([
            'name' => 'Autism Course',
            'videos_number' => '12',
            'descreption' => 'This Course Helping people how care about autism such as (perants,teachers,gardians)',
            'image_path' => 'Autism_Course.jpg',
            'price' => '550',
            'stripe_id' => 'price_1LB8dVGHrEGTh2jDH3Tcnq6z',

        ]);

        Course::create([
            'name' => 'Hearing Desabilities Course',
            'videos_number' => '9',
            'descreption' => 'This Course Helping people how care about Hearing Desabilities such as (perants,teachers,gardians)',
            'image_path' => 'Hearing_Desabilities_Course.jpg',
            'price' => '220',
            'stripe_id' => 'price_1LB8eeGHrEGTh2jDhA7PbuWA',
        ]);

    }
}
