<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class, 'class_id', 'id');
    }

    public function studentsClassesMapping(): HasMany
    {
        return $this->hasMany(StudentsClassesMapping::class, 'class_id', 'id');
    }

    public function studentAttendance(): HasMany
    {
        return $this->hasMany(StudentAttendance::class, 'class_id', 'id');
    }
}

