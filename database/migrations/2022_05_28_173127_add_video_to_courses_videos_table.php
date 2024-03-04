<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoToCoursesVideosTable extends Migration
{
    public function up()
    {
        Schema::table('courses_videos', function (Blueprint $table) {
            $table->string('video_path');
        });
    }

    public function down()
    {
        Schema::table('courses_videos', function (Blueprint $table) {
            $table->dropColumn('video_path');
        });
    }
}
