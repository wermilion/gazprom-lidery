<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\Translation\t;

class ProfileAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response([
            'status' => true,
            'message' => 'Выход из системы выполнен успешно'
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->all();
        $user_id = Auth::guard('web')->user()->id;

        try {

            User::where('id', $user_id)->update(array(
                'password' => Hash::make($data['new_password']),
                'custom_password' => true,
            ));
            $arr = response([
                'status' => true,
                'message' => 'Пароль был успешно изменён'
            ]);

        } catch (\Exception $ex) {
            $msg = $ex->getMessage();
            $arr = response([
                'status' => false,
                'message' => $msg
            ]);
        }
        return $arr;
    }
}
