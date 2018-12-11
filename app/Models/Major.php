<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
    	'code','name'
    ];

    public function level()
    {
    	return $this->belongsTo(Level::class);
    }
}
