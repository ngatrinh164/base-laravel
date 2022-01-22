<?php

namespace App\Repositories;

use App\Models\Equipment;
use App\Repositories\BaseRepository;

class EquipmentRepository extends BaseRepository
{
    protected $equipment;
    public function __construct(Equipment $equipment)
    {
        parent::__construct($equipment);
    }
    public function getItems($per_page)
    {
        return $this->model->with('category')->with('status')->paginate($per_page);
    }
}
