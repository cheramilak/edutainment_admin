<?php
namespace App\Livewire;

use App\Models\SpellingPuzzle;
use Flux\Flux;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class SpelingPuzzleManagment extends Component
{
    use WithFileUploads;

    public $image, $option, $answer;
    public $quiz;

    public function rules()
    {
        return [
            'image'  => $this->quiz ? 'nullable|image' : 'required|image',
            'answer' => 'required|string|regex:/^[A-Z\s]+$/',
            'option' => 'required|string|regex:/^[A-Z\s]+$/',
        ];
    }

    public function submit()
    {
        $this->validate();
        $quiz         = $this->quiz ?? new SpellingPuzzle();
        $quiz->answer = $this->answer;
        $quiz->option = $this->option;
        if ($this->image) {
            $quiz->image = $this->image->store('quiz', 'public');
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
        $this->quiz   = SpellingPuzzle::findOrFail($id);
        $this->answer = $this->quiz->answer;
        $this->option = $this->quiz->option;
        Flux::modal('quiz-form')->show();
    }
    public function render()
    {
        $quiz = SpellingPuzzle::all();
        $data = [
            'quizs' => $quiz,
        ];
        return view('livewire.speling-puzzle-managment', $data);
    }
}
