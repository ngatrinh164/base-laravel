<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidation extends BaseModel
{
    use HasFactory;
    protected $table = 'liquidation';
    protected $fillable = [
        "equipment_id",
        "employee_id",
        "place",
        "image",
        "price",
        "details",
        "price",
        "notes"
    ];
}
