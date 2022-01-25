<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;
use App\Services\EmployeeService;

class EmployeeRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Employee());
    }
    public function getItems($per_page)
    {
        return $this->model->with('department')->paginate($per_page);
    }
    public function getItem($id)
    {
        return $this->model->with('department')->with('request')->with('equipment_status_log')
            ->with('liquidation')->with('repair')->where('id', $id)->first();
    }
    public function find($id)
    {
        return $this->model->find($id)->first();
    }
}
