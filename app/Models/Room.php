<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    	'code', 'name', 'type_room_id', 'major_id'
    ];

    public function type_room()
    {
    	return $this->belongsTo(TypeRoom::class);
    }

    public function generates()
    {
    	return $this->hasMany(Major::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
