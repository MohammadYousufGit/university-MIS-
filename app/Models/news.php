<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $dates = ['created_at','updated_at','publish_date'];
    public function media()
    {
        return $this->hasMany(news_feature::class);
    }

}
