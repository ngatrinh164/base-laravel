<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

class RequestRepository extends BaseRepository
{
    public function __construct(RequestModel $request)
    {
        parent::__construct($request);
    }
    public function getItems($per_page)
    {
        return $this->model->paginate($per_page);
    }
    public function getItem($id)
    {
        return $this->model->where('id', $id)->first();
    }
    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }
    public function findBy($key, $value)
    {
        return $this->model->where($key, $value);
    }
    public function getEmployeeRequest($employee_id, $id)
    {
        return $this->model->where('employee_id', $employee_id)->where('id', $id)->first();
    }
}
