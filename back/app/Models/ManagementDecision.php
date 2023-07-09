<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementDecision extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'problem',
        'management_task',
        'solution',
        'result',
        'conclusion',
    ];
}
