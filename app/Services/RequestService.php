<?php

namespace App\Services;

use App\Enums\RequestStatus;
use App\Repositories\RequestRepository;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RequestService extends BaseService
{
    use HasFactory;
    public function __construct(RequestRepository $requestRepo)
    {
        parent::__construct($requestRepo);
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
                'employee_id' => 'required',
                'details' => 'required',
                'type' => 'required',
                'status' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Invalid data'
                ], 400);
            }
            $data = [
                'equipment_id' => $request->equipment_id,
                'status' => $request->status,
                'employee_id' => Auth::user()->id,
                'notes' => $request->notes ? $request->notes : '',
                'details' => $request->details ? $request->details : '',
                'type' => $request->type ? $request->type : ''

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
            'employee_id' => 'required',
            'details' => 'required',
            'type' => 'required',
            'status' => 'required',
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
            'status' => $request->status,
            'employee_id' => Auth::user()->id,
            'notes' => $request->notes ? $request->notes : '',
            'details' => $request->details ? $request->details : '',
            'type' => $request->type ? $request->type : ''

        ];
        $res = $this->repo->update($id, $data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
    public function getEmployeeRequest($request)
    {
        $employee_id = Auth::guard('employee')->user()->id;
        $items = $this->repo->findBy('employee_id', $employee_id)->get();
        return $items;
    }
    public function createEmployeeRequest($request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'equipment_id' => 'required',
                'details' => 'required',
                'type' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Invalid data'
                ], 400);
            }
            $data = [
                'equipment_id' => $request->equipment_id,
                'status' => RequestStatus::WAITING,
                'employee_id' => Auth::user()->id,
                'notes' => $request->notes ? $request->notes : '',
                'details' => $request->details ? $request->details : '',
                'type' => $request->type ? $request->type : ''

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
    public function showEmployeeRequest($request)
    {
        $employee_id = Auth::user()->id;
        $item = $this->repo->getEmployeeRequest($employee_id, $request->id);
        if (!$item) {
            return response()->json([
                'message' => 'Data not found'
            ]);
        }
        return $item;
    }
    public function updateEmployeeRequest($request)
    {
        $validator = Validator::make($request->all(), [
            'equipment_id' => 'required',
            'details' => 'required',
            'type' => 'required',
            'status' => 'required',
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
            'status' => $request->status,
            'employee_id' => Auth::user()->id,
            'notes' => $request->notes ? $request->notes : '',
            'details' => $request->details ? $request->details : '',
            'type' => $request->type ? $request->type : ''

        ];
        $res = $this->repo->update($id, $data);
        return response()->json([
            'message' => 'success',
            'data' => $res,
        ], 200);
    }
    public function deleteEmployeeRequest($request)
    {
        $item = $this->repo->find($request->id);
        if (!$item) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
        $item->delete();
        return response()->json([
            'message' => 'Delete successfull'
        ], 200);
    }
}
