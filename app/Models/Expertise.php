<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $fillable = [
    	'code','name', 'part', 'major_id'
    ];

    public function major()
    {
    	return $this->belongsTo(Major::class);
    }

    public function generates()
    {
    	return $this->hasMany(Major::class);
    }
}
