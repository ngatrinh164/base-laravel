<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;

class DepartmentController extends BaseController
{
    public function __construct(DepartmentService $deparmentService)
    {
        parent::__construct($deparmentService);
    }
}
