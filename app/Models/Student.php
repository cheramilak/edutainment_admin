<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_id', 'parent_id'];

    public function studentUser()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function parentUser()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
}
