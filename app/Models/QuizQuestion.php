<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    //

    public function options()
    {
        return $this->hasMany(QuizQuestionOption::class,'question_id');
    }
}