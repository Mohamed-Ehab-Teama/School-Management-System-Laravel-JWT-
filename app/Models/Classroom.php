<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
     * Relations
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }


    public function students()
    {
        return $this->hasManyThrough(
            User::class,
            Enrollment::class,
            'classroom_id',
            'id',
            'id',
            'student_id'
        );
    }
    // ================


    //
    protected $guarded = ['id'];
}
