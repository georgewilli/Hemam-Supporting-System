<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $fillable = ['course_id', 'quiz_id', 'question_head', 'first_option', 'second_option', 'third_option', 'fourth_option', 'answer'];

    protected $table = 'questions';

    public function quiz()
    {

        return $this->belongsTo(Quiz::class);
    }
}
