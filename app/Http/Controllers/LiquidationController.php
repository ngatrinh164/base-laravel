<?php

namespace App\Http\Controllers;

use App\Services\LiquidationService;


class LiquidationController extends BaseController
{
    public function __construct(LiquidationService $liquidationService)
    {
        parent::__construct($liquidationService);
    }
}
