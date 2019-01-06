<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generate extends Model
{
    protected $fillable = [
    	'days',
        'start',
		'end',
		'name',
		'teacher_id',
		'room_id',
		'lesson_id',
    ];

    public function expertise()
    {
    	return $this->belongsTo(Expertise::class);
    }

    public function lesson()
    {
    	return $this->belongsTo(lesson::class);
    }

    public function room()
    {
    	return $this->belongsTo(room::class);
    }

    public function teacher()
    {
    	return $this->belongsTo(teacher::class);
    }

    public static function days()
    {
        return ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
    }
}
