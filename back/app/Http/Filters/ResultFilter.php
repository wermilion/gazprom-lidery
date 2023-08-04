<?php

namespace App\Http\Filters;


use App\Models\User;

class ResultFilter extends QueryFilter
{
    public function result_status_id(int $result_status_id)
    {
        return $this->builder->where('result_status_id', $result_status_id);
    }

    public function tabel_number(string $tabel_number)
    {
        $user = User::query()->where('tabel_number', $tabel_number)->first();
        if (User::query()->where('tabel_number', $tabel_number)->exists()) {
            return $this->builder->where('user_id', $user->id);
        }
        return null;
    }
}
