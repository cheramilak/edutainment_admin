<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordPuzzle extends Model
{
    protected function casts(): array
    {
        return [
            'startIndex' => 'integer',
            'endIndex'   => 'integer',
        ];
    }

}
