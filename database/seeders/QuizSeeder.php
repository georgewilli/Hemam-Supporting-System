<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::create([
            'course_id' => '1',
            'name' => 'DownSyndrome Quiz',

        ]);

        Quiz::create([
            'course_id' => '2',
            'name' => 'Autism Quiz',

        ]);
        Quiz::create([
            'course_id' => '3',
            'name' => 'Hearing disabilities Quiz',

        ]);

    }
}
