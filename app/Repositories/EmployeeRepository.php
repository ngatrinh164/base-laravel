<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;


class EmployeeRepository extends BaseRepository
{
    protected $employee;
    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
    }
    public function getItems($per_page)
    {
        return $this->model->with('department')->paginate($per_page);
    }
}
