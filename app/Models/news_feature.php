<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_feature extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->belongsTo(news::class);
    }
}
