<?php

namespace App\Services;

use App\Http\Resources\EquipmentListResource;
use App\Repositories\EquipmentRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;




class EquipmentService extends BaseService
{
    protected $equipmentRepository;

    use HasFactory;
    public function __construct(EquipmentRepository $equipmentRepository)
    {
        parent::__construct($equipmentRepository);
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
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'imported_date' => 'required',
            'producer' => 'required',
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
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
    public function updateItem($request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'imported_date' => 'required',
            'producer' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'name' => 'required'
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
