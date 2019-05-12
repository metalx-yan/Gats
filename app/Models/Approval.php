<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Approval extends Model
{
    use softDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'beginning', 'end', 'status', 'user_id'
    ];

    public function generates()
    {
    	return $this->belongsToMany(Generate::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function majors()
    {
        return $this->hasManyThrough(Major::class, Generate::class);
    }
}
