<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    /**
     * Relations
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }



    public function grades()
    {
        return $this->hasMany(Grade::class, 'subject_id');
    }
    // =====
    protected $guarded = ['id'];
}
