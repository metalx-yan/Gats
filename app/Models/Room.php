<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    	'code', 'name', 'capacity', 'type_room_id'
    ];

    public function type_room()
    {
    	return $this->belongsTo(TypeRoom::class);
    }
}
