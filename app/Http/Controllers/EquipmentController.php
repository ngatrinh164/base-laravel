<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService;


class EquipmentController extends BaseController
{
    public function __construct(EquipmentService $equipmentService)
    {
        parent::__construct($equipmentService);
    }
}
