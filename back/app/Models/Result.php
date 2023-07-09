<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'stage_id',
        'user_id',
        'result_status_id'
    ];

    public function status()
    {
        return $this->belongsTo(ResultStatus::class, 'result_status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
