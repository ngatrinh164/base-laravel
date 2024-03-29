<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Log;

class EmployeeRepository extends BaseRepository
{
    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
    }
    public function getItems($per_page, $query = null)
    {
        $name = $query['name'] ?? '';
        if ($name) {
            return $this->model->with('department')->where('name', 'like', '%' . $name . '%')->paginate($per_page);
        }
        return $this->model->with('department')->paginate($per_page);
    }
    public function getItem($id)
    {
        return $this->model->with('department')->with('request')->with('equipment_status_log')
            ->with('liquidation')->with('repair')->where('id', $id)->first();
    }
    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
