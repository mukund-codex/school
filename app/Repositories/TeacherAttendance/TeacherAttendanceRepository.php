<?php

namespace App\Repositories\TeacherAttendance;

use App\Models\TeacherAttendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TeacherAttendanceRepository implements TeacherAttendanceInterface
{
    private TeacherAttendance $teacherAttendance;

    public function __construct(TeacherAttendance $teacherAttendance)
    {
        $this->teacherAttendance = $teacherAttendance;
    }

    public function index(): Collection|array
    {
        return User::where('role', config('constants.ROLE.TEACHER'))->with('teacherAttendance')->get()->toArray();
    }

    public function create(array $input): array
    {
        $attendanceData = $this->teacherAttendance->where('teacher_id', $input['teacher_id'])
            ->where('date', $input['date'])->first();
        if ($attendanceData) {
            $attendanceData->update($input);
            return $attendanceData->toArray();
        }

        $attendance = $this->teacherAttendance->create($input);
        return $attendance->toArray();
    }
}
