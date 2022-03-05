<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class DepartmentService extends BaseService
{
    use HasFactory;
    public function __construct(DepartmentRepository $departmentRepository)
    {
        parent::__construct($departmentRepository);
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
            $item = $this->repo->find($id);
            return $item;
        }
        return response()->json([
            'message' => 'Item not found'
        ], 404);
    }
    public function createItem($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data'
            ], 400);
        }
        $data = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'slug' => Str::slug($request->name, '-')

        ];
        $res = $this->repo->create($data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
    public function updateItem($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'quantity' => 'required',
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
            'name' => $request->name,
            'quantity' => $request->quantity,
            'slug' => Str::slug($request->name, '-')
        ];
        $res = $this->repo->update($id, $data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
}
