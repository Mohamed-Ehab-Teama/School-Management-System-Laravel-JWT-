<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * Relations
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }


    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    //

    
    protected $guarded = ['id'];
}
