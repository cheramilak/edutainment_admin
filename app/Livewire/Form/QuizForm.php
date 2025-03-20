<?php

namespace App\Livewire\Form;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithFileUploads;

class QuizForm extends Component
{
    use WithFileUploads;
    public $title,$image,$status;

    protected $rules = [
        'title' => 'required|string',
        'status' => 'required|integer',
        'image' => 'required|image'
    ];

    public function submit(){
        $this->validate();
        $quiz = new Quiz();
        $quiz->title = $this->title;
        $quiz->status = $this->status;
        $quiz->slug = time();
        $quiz->image = $this->image->store('quiz','public');
        $quiz->save();
        $this->reset();
    }
    public function render()
    {
        return view('livewire.form.quiz-form');
    }
}