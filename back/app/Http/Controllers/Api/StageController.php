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
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        $currentTime = Carbon::now();

        $stages = Stage::query()->orderBy('date_start')->where('activity', false)->get();

        foreach ($stages as $stage) {
            $stage->date_start <= $currentTime && $currentTime < $stage->date_end ? $stage->stage_status_id = 1 : $stage->stage_status_id = 2;
            $stage->update();
        }

        return StageResource::collection($stages);
    }

    public function show(Stage $stage): StageResource
    {
        return new StageResource($stage);
    }

    public function form(ProfileRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $data = $request->all();

        $stage = Stage::query()->where('name', 'Анкета и видеоинтервью')->first();
        $status = ResultStatus::query()->where('status_name', 'На проверке')->first();
        $user_id = Auth::guard('web')->user()->id;

        if ($stage->stage_status->status_name == 'Доступно' && !Result::query()->where('user_id', Auth::user()->id)->where('result_status_id', 2)->exists()) {
            if (Auth::user()->name == null) {
                User::query()->where('id', $user_id)->update([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'position' => $data['position'],
                    'work_experience' => $data['work_experience'],
                    'branch_id' => $data['branch_id'],
                    'check_video' => $data['check_video']
                ]);

                Result::query()->create([
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
                'message' => 'Этот этап Вам недоступен'
            ]);
        }
    }

    public function managementDecision(ManagementDecisionRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $data = $request->all();

        $stage = Stage::query()->where('name', 'Управленческие решения')->first();
        $status = ResultStatus::query()->where('status_name', 'На проверке')->first();
        $user_id = Auth::guard('web')->user()->id;

        if ($stage->stage_status->status_name == 'Доступно' && !Result::query()->where('user_id', Auth::user()->id)->where('result_status_id', 2)->exists()) {
            if (!ManagementDecision::query()->where('user_id', $user_id)->exists()) {
                ManagementDecision::query()->create([
                    'user_id' => $user_id,
                    'problem' => $data['problem'],
                    'management_task' => $data['management_task'],
                    'solution' => $data['solution'],
                    'result' => $data['result'],
                    'conclusion' => $data['conclusion'],
                    'check_file' => (bool)$data['check_file']
                ]);

                Result::query()->create([
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
                'message' => 'Этот этап Вам недоступен'
            ]);
        }
    }

    public function challenge(ChallengeRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $data = $request->all();

        $stage = Stage::query()->where('name', 'Задача')->first();
        $status = ResultStatus::query()->where('status_name', 'На проверке')->first();
        $user_id = Auth::guard('web')->user()->id;

        if ($stage->stage_status->status_name == 'Доступно' && !Result::query()->where('user_id', Auth::user()->id)->where('result_status_id', 2)->exists()) {
            if (!Challenge::query()->where('user_id', $user_id)->exists()) {
                Challenge::query()->create([
                    'user_id' => $user_id,
                    'solution' => $data['solution'],
                    'check_file' => (bool)$data['check_file']
                ]);

                Result::query()->create([
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
                'message' => 'Этот этап Вам недоступен'
            ]);
        }
    }
}
