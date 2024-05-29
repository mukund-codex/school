<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentsClassesMapping extends Model
{
    use HasFactory;

    protected $table = 'students_classes_mapping';

    protected $fillable = [
        'roll_no',
        'student_id',
        'class_id',
        'division_id'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Divisions::class, 'division_id', 'id');
    }
}
