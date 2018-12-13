<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $fillable = [
    	'code','name', 'major_id'
    ];

    public function major()
    {
    	return $this->belongsTo(Major::class);
    }
}
