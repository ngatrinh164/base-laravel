<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AdminService
{
    use HasFactory;
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __construct()
    {
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
        $token = auth()->guard('admin')->attempt($credentials);
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
            'user' => auth()->guard('admin')->user()
        ]);
    }
    public function updateProfile($request)
    {
        $query = $request->all();
        $user_id = auth()->guard('admin')->user()->id;
        $username = $query['username'] ?? '';
        if ($username) {
            $user = Admin::find($user_id)->first();
            $user->update([
                'user_name' => $username
            ]);
            $user->save();
            return response()->json([
                'data' => $user,
                'message' => 'Update success'
            ], 200);
        }
        return null;
    }
    public function changePassword($request)
    {
        $validator = Validator::make($request->all(), [
            'old_pass' => 'required',
            'new_pass' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data'
            ], 400);
        }
        $admin = auth()->guard('admin')->user();
        $oldPass = $request->old_pass;
        $newPass = $request->new_pass;
        $credentials = ['email' => $admin->email, 'password' => $oldPass];
        $token = auth()->guard('admin')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'message' => 'Password does not match',
                'data' => null
            ], 400);
        }
        $user = Admin::where('id', $admin->id)->update([
            'password' => Hash::make($newPass)
        ]);
        return response()->json([
            'message' => 'Update sucess',
            'data' => $user
        ], 200);
        return response()->json([
            'message' => 'Password does not match',
            'data' => null
        ], 400);
    }
}
