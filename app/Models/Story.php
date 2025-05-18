<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //

    public function contents()
    {
        return $this->hasMany(StoryContent::class, 'story_id');
    }
}
