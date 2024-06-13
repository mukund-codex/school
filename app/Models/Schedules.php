<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'class_id',
        'division_id',
        'subject_id',
        'start_time',
        'end_time',
        'date',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Divisions::class);
    }
}
