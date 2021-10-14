<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Models\User;
use App\Traits\ThrottleLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ThrottleLogin;

    protected $maxAttempts = 3;

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            $this->sendLockoutResponse($request);
        }

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            $this->incrementLoginAttempts($request);
            abort(400, 'Invalid Credentials');
        }

        $this->clearLoginAttempts($request);

        return BaseResponse::make([
            'token' => $user->createToken($user)->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return BaseResponse::make([
            'message' => 'token revoked',
        ]);
    }

}
