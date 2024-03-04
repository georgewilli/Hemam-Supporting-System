<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public $fillable = ['video_name', 'course_id', 'video_path', 'description'];

    protected $table = 'courses_videos';

    protected $primaryKey = 'id';

    public function course()
    {

        return $this->belongsTo(Course::class);
    }
}
