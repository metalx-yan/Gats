<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
    	'nip',
    	'lesson',
    	'name',
    	'status',
        'time' ,
        'type_teacher_id',
        // 'user_id',
    ];

    public function type_teacher()
    {
    	return $this->belongsTo(TypeTeacher::class);
    }

    public function generates()
    {
        return $this->hasMany(Generate::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public static function status()
    {
        return ['aktif', 'non aktif'];
    }
     public function parseToMinutes()
    {
        return $this->time;
    }
     public function parseToHours()
    {
        return $this->time / 60;
    }
}
