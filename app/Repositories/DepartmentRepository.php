<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\BaseRepository;

class DepartmentRepository extends BaseRepository
{
    public function __construct(Department $department)
    {
        parent::__construct($department);
    }
    public function getItems($per_page)
    {
        return $this->model->paginate($per_page);
    }
    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
