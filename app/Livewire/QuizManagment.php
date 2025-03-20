<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Attributes\Layout;
use Livewire\Component;

class QuizManagment extends Component
{
    #[Layout('admin.app',['title' => 'Ttile'])]
    public function render()
    {
        $quiz = Quiz::all();
        $data = [
            'quizs' => $quiz
        ];
        return view('livewire.quiz-managment',$data);
    }
}