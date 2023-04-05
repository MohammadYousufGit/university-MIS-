<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenfSubject extends Model
{
    use HasFactory;

    /**
     * Get the senf that owns the SenfSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function senf()
    {
        return $this->belongsTo(Senf::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
