<?php

namespace App\Livewire;

use App\Models\Story;
use App\Models\StoryContent;
use Flux\Flux;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoryContentManagment extends Component
{
   use WithFileUploads;

    public $image,$text;
    public $story;
    public $content;

    public function rules()
    {
        return [
            'image' =>  'nullable|image',
            'text' => 'required|string',
        ];
    }

    public function mount($slug)
    {
        $this->story = Story::where('slug',$slug)->firstOrFail();
    }

    public function submit()
    {
        $this->validate();
        $story = $this->content ?? new StoryContent();
        $story->story = $this->text;
        if($this->image)
        {
            $story->image = $this->image->store('story','public');
        }
        $story->story_id = $this->story->id;
        if(!$this->content)
        {
            $story->order = StoryContent::where('story_id',$this->story->id)->count();
        }
        $story->save();
        $this->resetExcept('story');
        Flux::modal('content-form')->close();
        LivewireAlert::title('Changes saved!')
        ->success()
        ->show();
    }

    public function add()
    {
        $this->resetExcept('story');
        Flux::modal('content-form')->show();
    }

    public function edit($id)
    {
        $this->content = StoryContent::findOrFail($id);
        $this->text = $this->content->story;
        Flux::modal('content-form')->show();
    }

    public function updateOrder($data)
    {
         LivewireAlert::title('Sort Item')
        ->text('Are you sure you want to change?')
        ->asConfirm()
        ->onConfirm('saveSortOrder', ['data' => $data])
        ->show();
        //dd($data);
    }

     public function saveSortOrder($data){
        //dd($items);
        $items = $data['data'];
        foreach($items as $item){
          $sto =  StoryContent::find($item['value']);
          $sto->order = $item['order'];
          $sto->save();

        }
    }
    public function render()
    {
        $stories = StoryContent::where('story_id',$this->story->id)->orderBy('order')->get();
        $data = [
            'stories' => $stories
        ];
        return view('livewire.story-content-managment',$data);
    }
}