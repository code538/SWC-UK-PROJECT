<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;

    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $response = $this->authService->login(
            $request->validated()
        );

        if (!$response) {
            return $this->error(
                'Invalid Credentials',
                [],
                401
            );
        }

        return $this->success(
            $response,
            'Login Successful'
        );
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return $this->success(
            [],
            'Logout Successful'
        );
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $response = $this->authService
            ->forgotPassword($request->email);

        if (!$response) {
            return $this->error(
                'Email not found'
            );
        }

        return $this->success(
            [],
            'OTP sent successfully'
        );
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $response = $this->authService
            ->verifyOtp(
                $request->email,
                $request->otp
            );

        if (!$response) {
            return $this->error(
                'Invalid OTP'
            );
        }

        return $this->success(
            [],
            'OTP verified successfully'
        );
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $response = $this->authService
            ->resetPassword(
                $request->email,
                $request->otp,
                $request->password
            );

        if (!$response) {
            return $this->error(
                'Invalid OTP'
            );
        }

        return $this->success(
            [],
            'Password reset successfully'
        );
    }

}