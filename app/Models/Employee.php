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
    public function request()
    {
        return $this->hasMany('App\Models\Request', 'employee_id', 'id');
    }
    public function equipment_status_log()
    {
        return $this->hasMany('App\Models\EquipmentStatusLog', 'employee_id', 'id');
    }
    public function liquidation()
    {
        return $this->hasMany('App\Models\Liquidation', 'employee_id', 'id');
    }
    public function repair()
    {
        return $this->hasMany('App\Models\Repair', 'employee_id', 'id');
    }
    protected $fillable = [
        'code',
        'join_date',
        'name',
        'email',
        'department_id',
        'password',
        'address',
        'phone_number',
        'is_manager'
    ];
}
