<?php

namespace App\Http\Resources;

use App\Models\ResultStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return $this->status->status_name;
    }
}
