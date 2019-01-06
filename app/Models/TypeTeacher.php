<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTeacher extends Model
{
    protected $fillable = [
    	'name', 'slug'
    ];

    public function teachers()
    {
    	return $this->hasMany(Teacher::class);
    }
}
