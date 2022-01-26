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
        return $this->hasOne('App\Models\EquipmentStatus', 'equipment_id', 'id');
    }
    public function status_log()
    {
        return $this->hasMany('App\Models\EquipmentStatusLog', 'equipment_id', 'id');
    }
    public function repair()
    {
        return $this->hasMany('App\Models\Repair', 'equipment_id', 'id');
    }
    public function liquidation()
    {
        return $this->hasOne('App\Models\Liquidation', 'equipment_id', 'id');
    }
    public function request()
    {
        return $this->hasMany('App\Models\Request', 'equipment_id', 'id');
    }
    protected $fillable = [
        "code",
        "imported_date",
        "producer",
        "image",
        "notes",
        "category_id",
        "price",
        "name"
    ];
}
