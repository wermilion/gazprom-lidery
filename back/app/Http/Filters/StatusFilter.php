<?php

namespace App\Http\Filters;

class StatusFilter extends QueryFilter
{
    public function result_status_id(int $result_status_id)
    {
        return $this->builder->where('result_status_id', $result_status_id);
    }
}
