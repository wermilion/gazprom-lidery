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
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\Translation\t;

class ProfileAuthController extends Controller
{
    public function login(LoginRequest $request): \Illuminate\Foundation\Application|Response|Application|ResponseFactory
    {
        $request->authenticate();
        return response([
            'status' => true,
            'id' => Auth::user()->id,
            'custom_password' => (bool)Auth::user()->custom_password,
        ])->setStatusCode(200);
    }

    public function logout(Request $request): \Illuminate\Foundation\Application|Response|Application|ResponseFactory
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response([
            'status' => true,
            'message' => 'Выход из системы выполнен успешно'
        ])->setStatusCode(200);
    }

    public function changePassword(ChangePasswordRequest $request): \Illuminate\Foundation\Application|Response|Application|ResponseFactory
    {
        if (!Auth::user()->custom_password) {
            $data = $request->all();

            $stageReg = Stage::query()->where('name', 'Регистрация')->first();
            $successStatus = ResultStatus::query()->where('status_name', 'Пройдено')->first();
            $user_id = Auth::guard('web')->user()->id;

            if ($stageReg->date_start <= Carbon::now() && Carbon::now() < $stageReg->date_end) {

                try {

                    User::query()->where('id', $user_id)->update(array(
                        'password' => Hash::make($data['new_password']),
                        'custom_password' => true,
                    ));
                    Result::query()->create([
                        'stage_id' => $stageReg->id,
                        'user_id' => $user_id,
                        'result_status_id' => $successStatus->id,
                    ]);

                    $arr = response([
                        'status' => true,
                        'message' => 'Пароль был успешно изменён'
                    ])->setStatusCode(200);

                } catch (Exception $ex) {
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
                ])->setStatusCode(403);
            }
        } else {
            $arr = response([
                'status' => false,
                'message' => 'Вы больше не можете изменить пароль'
            ])->setStatusCode(403);
        }
        return $arr;
    }
}
