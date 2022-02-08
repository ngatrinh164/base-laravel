<?php

namespace App\Repositories;

use App\Models\Repair;
use App\Repositories\BaseRepository;

class RepairRepository extends BaseRepository
{
    public function __construct(Repair $repair)
    {
        parent::__construct($repair);
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
}
