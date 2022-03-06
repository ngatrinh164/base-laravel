<?php

namespace App\Services;

use App\Enums\EquipmentStatusType;
use App\Http\Resources\EquipmentListResource;
use App\Repositories\EquipmentRepository;
use App\Repositories\EquipmentStatusLogRepository;
use App\Repositories\EquipmentStatusRepository;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;




class EquipmentService extends BaseService
{
    protected $equipmentRepository;
    protected $equipmentStatusRepo;
    use HasFactory;
    public function __construct(EquipmentRepository $equipmentRepository, EquipmentStatusRepository $equipmentStatusRepo)
    {
        parent::__construct($equipmentRepository);
        $this->equipmentStatusRepo = $equipmentStatusRepo;
    }
    public function getItems($request)
    {
        $items = $this->fetchItems($request);
        return new EquipmentListResource($items);
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
                'code' => 'required',
                'imported_date' => 'required',
                'category_id' => 'required',
                'price' => 'required',
                'name' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Invalid data'
                ], 400);
            }
            $data = [
                'code' => $request->code,
                'imported_date' => $request->imported_date,
                'producer' => $request->producer,
                'image' => $request->image ? $request->name : '',
                'notes' => $request->notes ? $request->notes : '',
                'category_id' => $request->category_id,
                'price' => $request->price,
                'name' => $request->name,
            ];
            $res = $this->repo->create($data);
            // create status
            $this->equipmentStatusRepo->create([
                'equipment_id' => $res->id,
                'type' => EquipmentStatusType::FREE,
                'status' => 100
            ]);
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
    public function updateItem($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'imported_date' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data'
            ], 400);
        }
        $item = $this->repo->find($id);
        if (!$item) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
        $data = [
            'code' => $request->code,
            'imported_date' => $request->imported_date,
            'producer' => $request->producer,
            'image' => $request->image ? $request->name : '',
            'notes' => $request->notes ? $request->notes : '',
            'category_id' => $request->category_id,
            'price' => $request->price,
            'name' => $request->name,
        ];
        $res = $this->repo->update($id, $data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
}
