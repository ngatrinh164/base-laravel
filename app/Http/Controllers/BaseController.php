<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;
    public function __construct($service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        return $this->service->getItems($request);
    }
    public function store(Request $request)
    {
        return $this->service->createItem($request);
    }
    public function update(Request $request)
    {
        return $this->service->updateItem($request);
    }
    public function delete(Request $request)
    {
        return $this->service->deleteItem($request->id);
    }
    public function show(Request $request)
    {
        return $this->service->getItem($request);
    }
}
