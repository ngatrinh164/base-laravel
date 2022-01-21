<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\JWTSubject;

class DepartmentController extends Controller
{
    protected $deparmentService;
    public function __construct(DepartmentService $deparmentService)
    {
        $this->deparmentService = $deparmentService;
    }
}
