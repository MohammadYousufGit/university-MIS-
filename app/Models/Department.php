<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * Get the faculty that owns the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Get all of the senfs for the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function senfs()
    {
        return $this->hasMany(Senf::class);
    }
}
