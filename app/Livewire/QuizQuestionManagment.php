<?php

namespace App\Livewire;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Livewire\Component;

class QuizQuestionManagment extends Component
{
    public $quiz;

    public function mount($slug)
    {
        $this->quiz = Quiz::where('slug',$slug)->first();
    }
    public function render()
    {
        $questions = QuizQuestion::where('quiz_id',$this->quiz->id)->get();

        $data = [
            'questions' => $questions
        ];

        return view('livewire.quiz-question-managment',$data);
    }
}
