<?php

namespace App\Services;

use App\Http\Resources\EmployeeResource;
use App\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeService
{
    use HasFactory;
    protected $employeeRepository;
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }
    public function getItems($request)
    {
        $query = $request->all();
        $per_page = $query ? $query->per_page : 10;
        $items = $this->employeeRepository->getItems($per_page);
        return new EmployeeResource($items);
    }
}
