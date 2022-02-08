<?php

namespace App\Http\Controllers;

use App\Services\RequestService;

class RequestController extends Controller
{
    protected $requestService;
    public function __construct(RequestService $requestService)
    {
        parent::__construct($requestService);
    }
}
