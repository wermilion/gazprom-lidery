<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'min_points',
        'sum_result'
    ];
}
