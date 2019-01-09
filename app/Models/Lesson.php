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
        'type_lesson_id',
        // 'major_id',
		'user_id'
    ];

    public function type_lesson()
    {
    	return $this->belongsTo(TypeLesson::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class);
    }

    public function generates()
    {
        return $this->hasMany(Major::class);
    }

    public static function semester()
    {
        return ['ganjil', 'genap'];
    }
}
