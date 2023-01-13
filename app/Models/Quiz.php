<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Question;

class Quiz extends Model
{
    use HasFactory;
    
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function image_url()
    {
        return Storage::url($this->image_path);
    }

    protected $fillable = [
        "name", 
        "description",
        "image_path"
    ];
}
