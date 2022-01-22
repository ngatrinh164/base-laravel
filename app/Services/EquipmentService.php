<?php

namespace App\Services;

use App\Http\Resources\EquipmentListResource;
use App\Repositories\EquipmentRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EquipmentService
{
    protected $equipmentRepository;

    use HasFactory;
    public function __construct(EquipmentRepository $equipmentRepository)
    {
        $this->equipmentRepository = $equipmentRepository;
    }
    public function getItems($request)
    {
        $query = $request->all();
        $per_page = $query ? $query->per_page : 10;
        $items = $this->equipmentRepository->getItems($per_page);
        return new EquipmentListResource($items);
    }
}
