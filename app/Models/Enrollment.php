<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{

    /**
     * Relations
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    //

    
    protected $guarded = ['id'];
}
