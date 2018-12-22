<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
		'code',
		'name',
		'total_hours',
		'semester',
		'beginning',
		'end',
		'type_lesson_id'
    ];

    public function type_lesson()
    {
    	return $this->belongsTo(TypeLesson::class);
    }
}
