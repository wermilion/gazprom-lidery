<?php

namespace App\Http\Resources;

use App\Models\ResultStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'stage_id' => $this->stage_id,
            'user_id' => $this->user_id,
            'result_status' => $this->status->status_name,
        ];
    }
}
