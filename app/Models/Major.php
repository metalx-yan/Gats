<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
    	'code','name', 'level_id'
    ];

    public function level()
    {
    	return $this->belongsTo(Level::class);
    }

    public function expertises()
    {
    	return $this->hasMany(Expertise::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    
}
