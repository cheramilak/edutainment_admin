<?php
namespace App\Livewire;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class QuizQuestionForm extends Component
{
    use WithFileUploads;
    public $image, $question, $status, $answer;
    public $questions, $game;
    public $options = [['opt' => ''], ['opt' => '']];
    public $quiz;
    #[Layout()]

    protected function rules()
    {
        return [
            'image'         => 'nullable|mimes:jpg,jpeg,png,gif',
            'status'        => 'nullable|boolean',
            'answer'        => 'required|integer',
            'question'      => 'required',
            'options.*.opt' => 'required|string',
        ];
    }
    public function mount($slug = null, $quiz = null)
    {
        if ($quiz) {
            $this->quiz = Quiz::where('slug', $quiz)->firstOrFail();
        }
        if ($slug) {
            $this->questions = QuizQuestion::where('slug', $slug)->firstOrFail();
            $this->question  = $this->questions->question;
            $this->status    = $this->questions->status == 1 ? true : false;
            $this->quiz      = Quiz::where('id', $this->questions->quiz_id)->firstOrFail();
            $options         = QuizQuestionOption::where('question_id', $this->questions->id)->get();
            $this->options   = [];
            foreach ($options as $index => $option) {
                $this->options[] = ['id' => $option->id, 'opt' => $option->option];
                if ($option->isCorrect) {
                    $this->answer = $index + 1;
                }
            }
        }
    }

    public function save()
    {
        $this->validate();
        $question = $this->questions ?? new QuizQuestion();
        if (count($this->options) < 2) {
            $this->addError('options', 'At least two options are required.');
            return;
        }

        $question->status   = $this->status ?? false;
        $question->question = $this->question;
        if ($this->image) {
            $question->image = $this->image ? $this->image->store('games', 'public') : null;
        }
        if (! $this->questions) {
            $question->slug = time();
        }
        $question->quiz_id = $this->quiz->id;
        $question->save();
        foreach ($this->options as $index => $option) {
            if ($option['id'] ?? null) {
                $opt            = QuizQuestionOption::find($option['id']);
                $opt->option    = $option['opt'];
                $opt->isCorrect = $index + 1 == $this->answer ? 1 : 0;
                $opt->save();
            } else {
                $opt              = new QuizQuestionOption();
                $opt->option      = $option['opt'];
                $opt->isCorrect   = $index + 1 == $this->answer ? 1 : 0;
                $opt->question_id = $question->id;
                $opt->save();
            }
        }
        return redirect()->route('quizQuestions', $this->quiz->slug);
    }

    public function addOptions()
    {
        $this->options[] = ['opt' => ''];
    }

    public function removeOptions($index)
    {
        if (count($this->options) > 2) {
            $option = $this->options[$index];
            if ($option['id'] ?? null) {
                $opt = QuizQuestionOption::find($option['id']);
                $opt->delete();
            }
            unset($this->options[$index]);
            $this->options = array_values($this->options);
        }
    }
    public function render()
    {
        return view('livewire.quiz-question-form');
    }
}
