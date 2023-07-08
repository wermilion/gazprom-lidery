<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'instruction',
        'date_start',
        'date_end',
        'stage_status_id',
        'activity',
    ];

    public function stage_status()
    {
        return $this->belongsTo(StageStatus::class, 'stage_status_id');
    }
}
