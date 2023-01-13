<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\Quiz;

class Question extends Model
{
    use HasFactory;

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function quize()
    {
        return $this->belongsTo(Quiz::class);
    }
}
