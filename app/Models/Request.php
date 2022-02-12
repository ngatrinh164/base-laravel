<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends BaseModel
{
    use HasFactory;
    protected $table = 'request';
    protected $fillable = [
        'equipment_id',
        'details',
        'employee_id',
        'notes',
        'status',
        'type'
    ];
}
