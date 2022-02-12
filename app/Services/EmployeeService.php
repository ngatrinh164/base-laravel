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
    public function login($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only(['email', 'password']);
        $token = auth()->guard('employee')->attempt($credentials);
        // dd('token', $token);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|between:2,100',
    //         'email' => 'required|string|email|max:100|unique:users',
    //         'password' => 'required|string|confirmed|min:6',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }

    //     $user = User::create(array_merge(
    //         $validator->validated(),
    //         ['password' => bcrypt($request->password)]
    //     ));

    //     return response()->json([
    //         'message' => 'User successfully registered',
    //         'user' => $user
    //     ], 201);
    // }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function refresh()
    // {
    //     return $this->createNewToken(auth()->refresh());
    // }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userInfo()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => '3600',
            'user' => auth()->guard('employee')->user()
        ]);
    }
}
