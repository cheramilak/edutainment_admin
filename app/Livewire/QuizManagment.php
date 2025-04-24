<?php

namespace App\Livewire;

use App\Models\Quiz;
use Flux\Flux;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class QuizManagment extends Component
{
    use WithFileUploads;

    public $image,$title,$status;
    public $quiz;

    public function rules()
    {
        return [
            'image' => $this->quiz ? 'nullable|image' : 'required|image',
            'title' => 'required|string',
            'status' => 'nullable|boolean',
        ];
    }

    public function submit()
    {
        $this->validate();
        $quiz = $this->quiz ?? new Quiz();
        $quiz->title = $this->title;
        $quiz->status = $this->status ?? false;
        if(!$this->quiz)
        {
            $quiz->slug = time();
        }
        if($this->image)
        {
            $quiz->image = $this->image->store('quiz','public');
        }
        $quiz->save();
        $this->reset();
        Flux::modal('quiz-form')->close();
        LivewireAlert::title('Changes saved!')
        ->success()
        ->show();
    }

    public function add()
    {
        $this->reset();
        Flux::modal('quiz-form')->show();
    }

    public function edit($id)
    {
        $this->quiz = Quiz::findOrFail($id);
        $this->title = $this->quiz->title;
        $this->status = $this->quiz->status == 0 ? false : true;
        Flux::modal('quiz-form')->show();
    }
    public function render()
    {
        $quiz = Quiz::all();
        $data = [
            'quizs' => $quiz
        ];
        return view('livewire.quiz-managment',$data);
    }
}