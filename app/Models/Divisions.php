<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Divisions extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'name',
    ];

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function studentsClassesMapping(): HasMany
    {
        return $this->hasMany(StudentsClassesMapping::class, 'division_id', 'id');
    }

    public function studentAttendance(): HasMany
    {
        return $this->hasMany(StudentAttendance::class, 'division_id', 'id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedules::class, 'division_id', 'id');
    }
}
