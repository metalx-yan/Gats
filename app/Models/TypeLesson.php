<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeLesson extends Model
{
    protected $fillable = [
    	'name', 'slug'
    ];

    public function lessons()
    {
    	return $this->hasMany(Lesson::class);
    }
}
