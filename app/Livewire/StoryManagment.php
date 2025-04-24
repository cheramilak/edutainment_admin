<?php

namespace App\Livewire;

use App\Models\Story;
use Flux\Flux;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoryManagment extends Component
{
    use WithFileUploads;

    public $image,$title,$status,$description;
    public $story;

    public function rules()
    {
        return [
            'image' => $this->story ? 'nullable|image' : 'required|image',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'nullable|boolean',
        ];
    }

    public function submit()
    {
        $this->validate();
        $story = $this->story ?? new Story();
        $story->title = $this->title;
        $story->description = $this->title;
        $story->status = $this->status ?? false;
        if(!$this->story)
        {
            $story->slug = time();
        }
        if($this->image)
        {
            $story->image = $this->image->store('story','public');
        }
        $story->save();
        $this->reset();
        Flux::modal('story-form')->close();
        LivewireAlert::title('Changes saved!')
        ->success()
        ->show();
    }

    public function add()
    {
        $this->reset();
        Flux::modal('story-form')->show();
    }

    public function edit($id)
    {
        $this->story = Story::findOrFail($id);
        $this->title = $this->story->title;
        $this->description = $this->story->description;
        $this->status = $this->story->status == 0 ? false : true;
        Flux::modal('story-form')->show();
    }
    public function render()
    {
        $stories = Story::all();
        $data = [
            'stories' => $stories
        ];


        return view('livewire.story-managment',$data);
    }
}