<?php

namespace App\Services;

use App\Http\Resources\EmployeeDetail;
use App\Http\Resources\EmployeeResource;
use App\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class EmployeeService extends BaseService
{
    use HasFactory;
    public function __construct(EmployeeRepository $employeeRepository)
    {
        parent::__construct($employeeRepository);
    }
    public function getItems($request)
    {
        $items = $this->fetchItems($request);
        return new EmployeeResource($items);
    }
    public function getItem($request)
    {
        $id = $request->id ? $request->id : 0;
        if ($id) {
            $item = $this->repo->getItem($id);
            return new EmployeeDetail($item);
        }
        return response()->json([
            'message' => 'Item not found'
        ], 404);
    }
    public function createItem($request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'join_date' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'department_id' => 'required',
            'password' => 'required',
            'is_manager' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data'
            ], 400);
        }
        $data = [
            'code' => $request->code,
            'join_date' => $request->join_date,
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'password' => Hash::make($request->password),
            'address' => $request->address ? $request->address : '',
            'phone_number' => $request->phone_number ? $request->phone_number : '',
            'is_manager' => $request->is_manager
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
            'join_date' => 'required',
            'name' => 'required',
            'department_id' => 'required',
            'is_manager' => 'required'
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
            'join_date' => $request->join_date,
            'name' => $request->name,
            'department_id' => $request->department_id,
            'address' => $request->address ? $request->address : '',
            'phone_number' => $request->phone_number ? $request->phone_number : '',
            'is_manager' => $request->is_manager
        ];
        $res = $this->repo->update($id, $data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
}
