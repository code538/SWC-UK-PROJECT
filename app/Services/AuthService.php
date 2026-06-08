<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\ForgotPasswordOtpMail;
use App\Services\MailConfigService;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(array $credentials): array|bool
    {
        if (!Auth::attempt($credentials)) {
            return false;
        }

        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
            'user'  => $user,
        ];
    }

    public function logout(Request $request): bool
    {
        $request->user()
            ->currentAccessToken()
            ->delete();

        return true;
    }

    public function forgotPassword(string $email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        $otp = rand(100000, 999999);

        DB::table('password_resets')
            ->updateOrInsert(
                ['email' => $email],
                [
                    'otp' => $otp,
                    'expires_at' => now()->addMinutes(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

        MailConfigService::load();

        Mail::to($email)
            ->send(new ForgotPasswordOtpMail($otp));

        return true;
    }

    public function verifyOtp($email, $otp)
    {
        $record = DB::table('password_resets')
            ->where('email', $email)
            ->where('otp', $otp)
            ->first();

        if (!$record) {
            return false;
        }

        if (Carbon::parse($record->expires_at)->isPast()) {
            return false;
        }

        return true;
    }

    public function resetPassword($email, $otp, $password)
    {
        $record = DB::table('password_resets')
            ->where('email', $email)
            ->where('otp', $otp)
            ->first();

        if (!$record) {
            return false;
        }

        if (Carbon::parse($record->expires_at)->isPast()) {
            return false;
        }

        User::where('email', $email)
            ->update([
                'password' => Hash::make($password)
            ]);

        DB::table('password_resets')
            ->where('email', $email)
            ->delete();

        return true;
    }
    
}