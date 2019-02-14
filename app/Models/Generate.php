<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Generate extends Model
{
    protected $fillable = [
    	'day',
        'start',
		'end',
		'read',
        'teacher_id',
		'major_id',
		'room_id',
		'lesson_id',
        'user_id',
        'generate_id',
        'role_id'
    ];

    public function major()
    {
    	return $this->belongsTo(Major::class);
    }

    public function generate()
    {
        return $this->hasOne(Generate::class);
    }

    public function lesson()
    {
    	return $this->belongsTo(lesson::class);
    }

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public static function day()
    {
        return ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
    }

    public function approvals()
    {
        return $this->belongsToMany(Approval::class);
    }

    public function istirahat()
    {
        $diff = Carbon::parse($this->start)->addMinute(30)->format('H:i:s');
        return $this->end == $diff;
    }

    public function jamKosong($sesi = 1)
    {
        $diff = Carbon::parse($this->start);
        if ($sesi == 2) {
            $c = Carbon::parse($this->start)->addMinutes(45)->format('H:i:s');
            if (is_null(Generate::where('day', $this->day)->whereNull('teacher_id')->where('start', $c)->first())) {
                return false;
            } else {
                return Generate::where('day', $this->day)->whereNull('teacher_id')->where('start', $c)->first()->jamKosong();
            }
        } else {
            return $this->end == $diff->addMinute(45)->format('H:i:s');
        }
    }

    public function nextJamKosong()
    {
        $c = Carbon::parse($this->start)->addMinutes(45)->format('H:i:s');
        return Generate::where('day', $this->day)->whereNull('teacher_id')->where('start', $c)->first();
    }

    public function jamPelajaranSatuSesi()
    {
        return is_null($this->generate) and !is_null($this->teacher_id);
    }

    public function jamPelajaranDuaSesi()
    {
        return !is_null($this->generate);
    }
}
