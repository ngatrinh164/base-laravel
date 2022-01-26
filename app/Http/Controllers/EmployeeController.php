<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;

class EmployeeController extends BaseController
{
    public function __construct(EmployeeService $employeeService)
    {
        parent::__construct($employeeService);
    }
}
