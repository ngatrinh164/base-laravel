<?php

namespace App\Repositories;

use App\Models\Equipment;
use App\Repositories\BaseRepository;

class EquipmentRepository extends BaseRepository
{
    public function __construct(Equipment $equipment)
    {
        parent::__construct($equipment);
    }
    public function getItems($per_page)
    {
        return $this->model->with('category')->with('status')->paginate($per_page);
    }
    public function getItem($id)
    {
        return $this->model->with('status')->with('category')->with('status_log')->with('repair')->with('liquidation')->with('request')->where('id', $id)->first();
    }
    public function find($id)
    {
        return $this->model->find($id)->first();
    }
}
