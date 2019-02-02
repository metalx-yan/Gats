<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
    	'beginning', 'end', 'status', 'user_id'
    ];

    public function generates()
    {
    	return $this->belongsToMany(Generate::class);
    }
}
