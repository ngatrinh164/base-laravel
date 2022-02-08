<?php

namespace App\Repositories;

use App\Models\EquipmentStatus;
use App\Repositories\BaseRepository;

class EquipmentStatusRepository extends BaseRepository
{
    public function __construct(EquipmentStatus $equipmentStatus)
    {
        parent::__construct($equipmentStatus);
    }
}
