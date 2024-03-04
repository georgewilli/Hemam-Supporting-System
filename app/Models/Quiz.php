<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public $fillable = ['name', 'course_id'];

    protected $table = 'quizzes';

    public function quizzesQuestions()
    {

        return $this->hasMany(Question::class);
    }
}
