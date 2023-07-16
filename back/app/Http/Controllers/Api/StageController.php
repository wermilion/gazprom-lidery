<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ChallengeRequest;
use App\Http\Requests\ManagementDecisionRequest;
use App\Http\Resources\StageResource;
use App\Models\Challenge;
use App\Models\ManagementDecision;
use App\Models\Result;
use App\Models\ResultStatus;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
{

    public function index()
    {
        $currentTime = Carbon::now();

        $stages = Stage::orderBy('date_start')->where('activity', false)->get();

        foreach ($stages as $stage) {
            $stage->date_start <= $currentTime && $currentTime < $stage->date_end ? $stage->stage_status_id = 1 : $stage->stage_status_id = 2;
            $stage->update();
        }

        return StageResource::collection($stages);
    }

    public function show(Stage $stage)
    {
        return new StageResource($stage);
    }

    public function form(ProfileRequest $request)
    {
        $data = $request->all();

        $stage = Stage::where('name', 'Анкета и видеоинтервью')->first();
        $status = ResultStatus::where('status_name', 'На проверке')->first();
        $user_id = Auth::guard('web')->user()->id;

        if ($stage->stage_status->status_name == 'Доступно') {
            if (Auth::user()->name == null) {
                User::where('id', $user_id)->update([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'position' => $data['position'],
                    'work_experience' => $data['work_experience'],
                    'check_video' => $data['check_video']
                ]);

                Result::create([
                    'stage_id' => $stage->id,
                    'user_id' => $user_id,
                    'result_status_id' => $status->id
                ]);

                return response([
                    'status' => true,
                    'message' => 'Данные успешно отправлены'
                ]);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Вы уже проходили этот этап'
                ]);
            }
        } else {
            return response([
                'status' => false,
                'message' => 'Вы уже проходили этот этап'
            ]);
        }
    }

    public function managementDecision(ManagementDecisionRequest $request)
    {
        $data = $request->all();

        $stage = Stage::where('name', 'Управленческие решения')->first();
        $status = ResultStatus::where('status_name', 'На проверке')->first();
        $user_id = Auth::guard('web')->user()->id;

        if ($stage->stage_status->status_name == 'Доступно') {
            if (!ManagementDecision::where('user_id', $user_id)->exists()) {
                ManagementDecision::create([
                    'user_id' => $user_id,
                    'problem' => $data['problem'],
                    'management_task' => $data['management_task'],
                    'solution' => $data['solution'],
                    'result' => $data['result'],
                    'conclusion' => $data['conclusion'],
                ]);

                Result::create([
                    'stage_id' => $stage->id,
                    'user_id' => $user_id,
                    'result_status_id' => $status->id
                ]);

                return response([
                    'status' => true,
                    'message' => 'Данные успешно отправлены'
                ]);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Вы уже проходили этот этап'
                ]);
            }
        } else {
            return response([
                'status' => false,
                'message' => 'Этап недоступен'
            ]);
        }
    }

    public function challenge(ChallengeRequest $request)
    {
        $data = $request->all();

        $stage = Stage::where('name', 'Задача')->first();
        $status = ResultStatus::where('status_name', 'На проверке')->first();
        $user_id = Auth::guard('web')->user()->id;

        if ($stage->stage_status->status_name == 'Доступно') {
            if (!Challenge::where('user_id', $user_id)->exists()) {
                Challenge::create([
                    'user_id' => $user_id,
                    'solution' => $data['solution'],
                ]);

                Result::create([
                    'stage_id' => $stage->id,
                    'user_id' => $user_id,
                    'result_status_id' => $status->id
                ]);

                return response([
                    'status' => true,
                    'message' => 'Данные успешно отправлены'
                ]);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Вы уже проходили этот этап'
                ]);
            }
        } else {
            return response([
                'status' => false,
                'message' => 'Этап недоступен'
            ]);
        }
    }
}
