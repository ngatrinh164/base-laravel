<?php

namespace App\Http\Controllers;

use App\Services\RequestService;

use Illuminate\Http\Request;

class RequestController extends BaseController
{
    protected $requestService;
    public function __construct(RequestService $requestService)
    {
        parent::__construct($requestService);
    }
    public function createEmployeeRequest(Request $request)
    {
        return $this->service->createEmployeeRequest($request);
    }
    public function getEmployeeRequest(Request $request)
    {
        return $this->service->getEmployeeRequest($request);
    }
    public function showEmployeeRequest(Request $request)
    {
        return $this->service->showEmployeeRequest($request);
    }
    public function deleteEmployeeRequest(Request $request)
    {
        return $this->service->deleteEmployeeRequest($request);
    }
    public function updateEmployeeRequest(Request $request)
    {
        return $this->service->updateEmployeeRequest($request);
    }
}
