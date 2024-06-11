<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'address',
        'role',
        'profile_picture',
        'dob',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function studentEnrollment(): HasOne
    {
        return $this->hasOne(StudentEnrollment::class, 'student_id', 'id');
    }

    public function StudentClassesMapping(): HasOne
    {
        return $this->hasOne(StudentsClassesMapping::class, 'student_id', 'id');
    }

    public function studentAttendance(): HasMany
    {
        return $this->hasMany(StudentAttendance::class, 'student_id', 'id');
    }

    public function teacherSubjectsMapping(): HasMany
    {
        return $this->hasMany(TeacherSubjectsMapping::class, 'teacher_id', 'id');
    }
}
