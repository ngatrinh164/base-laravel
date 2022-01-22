<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends BaseModel
{
    use HasFactory;
    protected $hidden = [
        'password',
    ];
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
