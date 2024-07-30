<?php

namespace App\Services;

use App\Models\Schedules;
use App\Models\TeacherSubjectsMapping;

class ScheduleService
{
    public function __construct()
    {
        //
    }

    public function updateSchedule(int $teacherId): void
    {
        $this->getSubsituteTeacher($teacherId);
    }

    private function getSubsituteTeacher(int $teacherId): void
    {
        $this->getTeacherSubjects($teacherId);
    }

    private function getTeacherSubjects(int $teacherId)
    {
        $teacherSubjects = TeacherSubjectsMapping::where('teacher_id', $teacherId)->first();
        $teacherSchedule = $this->getTeacherSchedule($teacherId, $teacherSubjects->subject_id);

        $otherTeachers = $this->getTeacherSchedule( start_time: $teacherSchedule->start_time, end_time: $teacherSchedule->end_time);
        foreach ($otherTeachers as $otherTeacher) {
            $otherTeacherSubjects = $this->getTeacherSchedule(teacher_id: $otherTeacher->teacher_id, subject_id: $teacherSubjects->subject_id);
            if (count($otherTeacherSubjects) === 0) {
                $this->updateTeacherSchedule($otherTeacher, $teacherId);
                break;
            }

            foreach($otherTeacherSubjects as $otherTeacherSubject) {
                $otherTeacherSchedule = $this->getTeacherSchedule();
        }
    }

    private function getTeacherSchedule(int $teacher_id = null, int $subject_id = null, $start_time = null, $end_time = null): mixed
    {
        return Schedules::where('teacher_id', $teacher_id)
            ->where('subject_id', $subject_id)
            ->where('start_time', '!=', $start_time)
            ->where('end_time', '!=', $end_time)->get();
    }

    private function updateTeacherSchedule(): void
    {

    }
}
