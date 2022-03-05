<?php

namespace App\Http\Controllers;

use App\Services\AdminService;

use Illuminate\Http\Request;

class AdminController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    protected $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        return $this->adminService->login($request);
    }

    public function logout()
    {
        return $this->adminService->logout();
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
        return $this->adminService->userInfo();
    }

    public function updateProfile(Request $request)
    {
        return $this->adminService->updateProfile($request);
    }
    public function changePassword(Request $request)
    {
        return $this->adminService->changePassword($request);
    }
}
