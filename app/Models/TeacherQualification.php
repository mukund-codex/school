<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'school',
        'degree',
        'study',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'grade',
        'description',
    ];
}
