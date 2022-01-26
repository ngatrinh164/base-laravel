<?php

namespace App\Services;

use App\Http\Resources\CategoryListResource;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class CategoryService extends BaseService
{
    use HasFactory;
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct($categoryRepository);
    }
    public function getItems($request)
    {
        $items = $this->fetchItems($request);
        return new CategoryListResource($items);
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
            'notes' => $request->notes ? $request->notes : ''

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
            'name' => 'required',
            'quantity' => 'required',
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
            'name' => $request->name,
            'quantity' => $request->quantity,
            'notes' => $request->notes ? $request->notes : ''
        ];
        $res = $this->repo->update($id, $data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
}
