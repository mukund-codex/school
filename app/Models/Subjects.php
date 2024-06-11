<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'status',
    ];

    public function teacherSubjectsMapping(): HasMany
    {
        return $this->hasMany(TeacherSubjectsMapping::class, 'subject_id', 'id');
    }
}
