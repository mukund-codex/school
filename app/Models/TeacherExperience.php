<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'title',
        'employment_type',
        'company_name',
        'location',
        'location_type',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'current',
        'description',
    ];
}
