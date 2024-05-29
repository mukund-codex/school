<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name_1',
        'relation_1',
        'contact_1',
        'name_2',
        'relation_2',
        'contact_2',
        'name_3',
        'relation_3',
        'contact_3',
    ];
}
