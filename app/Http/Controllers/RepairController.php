<?php

namespace App\Http\Controllers;

use App\Services\RepairService;


class RepairController extends BaseController
{
    public function __construct(RepairService $repairService)
    {
        parent::__construct($repairService);
    }
}
