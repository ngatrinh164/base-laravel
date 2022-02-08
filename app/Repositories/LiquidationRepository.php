<?php

namespace App\Repositories;

use App\Models\Liquidation;
use App\Repositories\BaseRepository;

class LiquidationRepository extends BaseRepository
{
    public function __construct(Liquidation $liquidation)
    {
        parent::__construct($liquidation);
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
