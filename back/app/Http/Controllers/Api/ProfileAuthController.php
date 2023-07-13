<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\Result;
use App\Models\ResultStatus;
use App\Models\Stage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\Translation\t;

class ProfileAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        return response([
            'status' => true,
            'custom_password' => (bool)Auth::user()->custom_password,
        ]);
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

        $stageReg = Stage::where('name', 'Регистрация')->first();
        $successStatus = ResultStatus::where('status_name', 'Пройдено')->first();
        $user_id = Auth::guard('web')->user()->id;

        if ($stageReg->date_start <= Carbon::now() && Carbon::now() < $stageReg->date_end) {

            try {

                User::where('id', $user_id)->update(array(
                    'password' => Hash::make($data['new_password']),
                    'custom_password' => true,
                ));
                Result::create([
                    'stage_id' => $stageReg->id,
                    'user_id' => $user_id,
                    'result_status_id' => $successStatus->id,
                ]);

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

        } else {
            return response([
                'status' => false,
                'message' => 'Сроки входа (регистрации) были нарушены'
            ]);
        }
        return $arr;
    }
}
