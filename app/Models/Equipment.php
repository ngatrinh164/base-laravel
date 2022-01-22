<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends BaseModel
{
    use HasFactory;
    protected $table = 'equipments';
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function status()
    {
        return $this->hasOne('App\Models\EquipmentStatus', 'id', 'equipment_id');
    }
}
