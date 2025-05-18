<?php
namespace App\Livewire;

use App\Models\WordPuzzle;
use Flux\Flux;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class WordPuzzleManagment extends Component
{

    public $question, $answer, $startIndex, $endIndex;
    public $quiz;

    public function rules()
    {
        return [
            'question'   => 'required|string',
            'answer'     => 'required|string',
            'startIndex' => 'required|integer',
            'endIndex'   => 'required|integer|gt:startIndex',
        ];
    }

    public function submit()
    {
        $this->validate();
        $quiz             = $this->quiz ?? new WordPuzzle();
        $quiz->question   = $this->question;
        $quiz->answer     = $this->answer;
        $quiz->startIndex = $this->startIndex;
        $quiz->endIndex   = $this->endIndex;
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
        $this->quiz       = WordPuzzle::findOrFail($id);
        $this->question   = $this->quiz->question;
        $this->answer     = $this->quiz->answer;
        $this->startIndex = $this->quiz->startIndex;
        $this->endIndex   = $this->quiz->endIndex;

        Flux::modal('quiz-form')->show();
    }
    public function render()
    {
        $quiz = WordPuzzle::all();
        $data = [
            'quizs' => $quiz,
        ];
        return view('livewire.word-puzzle-managment', $data);
    }
}
