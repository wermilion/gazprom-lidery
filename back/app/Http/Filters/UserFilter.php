<?php

namespace App\Http\Filters;

class UserFilter extends QueryFilter
{
    public function tabel_number(string $tabel_number)
    {
        return $this->builder->where('tabel_number', $tabel_number);
    }

    public function branch_id(int $branch_id)
    {
        return $this->builder->where('branch_id', $branch_id);
    }
}
