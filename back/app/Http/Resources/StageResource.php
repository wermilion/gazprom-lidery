<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class StageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'instruction' => $this->when($this->name != 'Регистрация', $this->instruction),
            'image' => $this->image,
            'date_start' => $this->when($this->name != 'Регистрация', $this->date_start),
            'date_end' => $this->when($this->name != 'Регистрация', $this->date_end),
            'status' => $this->when(ResultResource::collection((Auth::user()->results->where('stage_id', $this->id)))->isEmpty(), $this->stage_status->status_name),
            'result' => $this->when(!ResultResource::collection((Auth::user()->results->where('stage_id', $this->id)))->isEmpty(), ResultResource::collection((Auth::user()->results->where('stage_id', $this->id)))),
        ];
    }
}
