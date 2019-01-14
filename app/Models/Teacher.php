<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
    	'nip',
    	'code',
    	'name',
    	'status',
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
}
