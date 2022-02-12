<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded = 'employee';

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
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
