<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends BaseModel
{
    use HasFactory;
    public function equipment()
    {
        return $this->hasMany('App\Models\Equipment', 'id', 'equipment_id');
    }
    protected $fillable = [
        'equipment_id',
        'place',
        'details',
        'price',
        'start_date',
        'employee_id',
        'end_date',
        'notes',
        'status'
    ];
}
