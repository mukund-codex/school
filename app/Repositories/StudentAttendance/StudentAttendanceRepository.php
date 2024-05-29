<?php

namespace App\Repositories\StudentAttendance;

use App\Models\StudentAttendance;
use App\Models\StudentsClassesMapping;

class StudentAttendanceRepository implements StudentAttendanceInterface
{
    private StudentAttendance $studentAttendance;

    public function __construct(StudentAttendance $studentAttendance)
    {
        $this->studentAttendance = $studentAttendance;
    }

    public function index(): array
    {
        $data = StudentsClassesMapping::with('student')->with('class')->with('division')->get();
        foreach ($data->toArray() as $item => $value)
        {
            $attendance = $this->studentAttendance->where('student_id', $value['student_id'])->where('class_id', $value['class_id'])->where('division_id', $value['division_id'])->get()->toArray();
            $attend = !empty($attendance[0]) ? $attendance[0] : [];
            $data[$item]['attendance'] = $attend;
        }
        return $data->toArray();
    }

    public function create(array $input): array
    {
        $attendanceData = $this->studentAttendance->where('id', $input['attendance_id'])->first();
        if ($attendanceData) {
            $attendanceData->update($input);
            return $attendanceData->toArray();
        }

        $attendance = $this->studentAttendance->create($input);
        return $attendance->toArray();
    }
}
