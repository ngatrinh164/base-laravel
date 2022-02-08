<?php

namespace App\Services;

use App\Enums\EquipmentStatusType;
use App\Http\Resources\EquipmentListResource;
use App\Repositories\EquipmentRepository;
use App\Repositories\EquipmentStatusLogRepository;
use App\Repositories\EquipmentStatusRepository;
use App\Repositories\LiquidationRepository;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;




class LiquidationService extends BaseService
{
    use HasFactory;
    protected $liquidationRepo;

    public function __construct(LiquidationRepository $liquidationRepo)
    {
        parent::__construct($liquidationRepo);
    }
    public function getItems($request)
    {
        $items = $this->fetchItems($request);
        return $items;
    }
    public function getItem($request)
    {
        $id = $request->id ? $request->id : 0;
        if ($id) {
            $item = $this->repo->getItem($id);
            return $item;
        }
        return response()->json([
            'message' => 'Item not found'
        ], 404);
    }
    public function createItem($request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'equipment_id' => 'required',
                'place' => 'required',
                'details' => 'required',
                'price' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Invalid data'
                ], 400);
            }
            $data = [
                'equipment_id' => $request->equipment_id,
                'place' => $request->place,
                'details' => $request->details,
                'price' => $request->price,
                'employee_id' => Auth::user()->id,
                'notes' => $request->notes ? $request->notes : '',
            ];
            $res = $this->repo->create($data);
            DB::commit();
            return response()->json([
                'message' => 'success',
                'data' => $res,
            ], 200);
        } catch (Error $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'success',
                'data' => $res,
            ], 200);
        }
    }
    public function updateItem($request)
    {
        $validator = Validator::make($request->all(), [
            'equipment_id' => 'required',
            'place' => 'required',
            'details' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data'
            ], 400);
        }
        $id = $request->id || 0;
        $item = $this->repo->find($id);
        if (!$item) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
        $data = [
            'equipment_id' => $request->equipment_id,
            'place' => $request->place,
            'details' => $request->details,
            'price' => $request->price,
            'employee_id' => Auth::user()->id,
            'notes' => $request->notes ? $request->notes : '',
        ];
        $res = $this->repo->update($id, $data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
}
