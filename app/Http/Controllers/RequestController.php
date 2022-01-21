<?php

namespace App\Http\Controllers;

use App\Services\RequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\JWTSubject;

class RequestController extends Controller
{
    protected $requestService;
    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }
}
