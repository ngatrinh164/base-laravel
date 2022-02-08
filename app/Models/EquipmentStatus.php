<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentStatus extends BaseModel
{
    use HasFactory;
    protected $table = 'equipment_status';

    protected $fillable = [
        "equipment_id",
        "type",
        "status",
    ];
}
