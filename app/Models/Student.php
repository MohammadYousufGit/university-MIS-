<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    /**
     * The senfs that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function senfs()
    {
        return $this->belongsToMany(Senf::class,'senf_students');
    }

    public function senf()
    {
        return $this->belongsTo(Senf::class,'current_senf_id');
    }

    /**
     * Get all of the payments for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
