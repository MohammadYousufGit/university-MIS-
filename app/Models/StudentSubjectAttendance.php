<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubjectAttendance extends Model
{
    use HasFactory;

    /**
     * Get the senf_subject that owns the StudentSubjectAttendance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function senf_subject()
    {
        return $this->belongsTo(SenfSubject::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
