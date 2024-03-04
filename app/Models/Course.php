<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $fillable = ['name', 'videos_number', 'descreption', 'price', 'image_path', 'stripe_id'];

    protected $table = 'courses';

    protected $primaryKey = 'id';

    public function coursesVideos()
    {

        return $this->hasMany(Video::class);
    }

    public function Coursesquizzes()
    {

        return $this->hasMany(Quiz::class);
    }

    public function Courses()
    {
        return $this->belongsToMany(User::class);
    }

    public function finishedCourses()
    {
        return $this->belongsToMany(User::class, 'finished_courses');
    }
}
