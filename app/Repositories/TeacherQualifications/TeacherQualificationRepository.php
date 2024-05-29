<?php

namespace App\Repositories\TeacherQualifications;

use App\Models\TeacherQualification;

class TeacherQualificationRepository implements TeacherQualificationInterface
{
    private TeacherQualification $teacherQualification;

    public function __construct(TeacherQualification $teacherQualification)
    {
        $this->teacherQualification = $teacherQualification;
    }

    public function index(int $teacherId): array
    {
        return $this->teacherQualification->where('teacher_id', $teacherId)->get()->toArray();
    }

    public function create(array $input): array
    {
        if ($this->teacherQualification->create($input))
        {
            return [
                'status' => 'success',
                'message' => __('messages.teacher_qualifications.create.success'),
                'route' => route('teacher.qualifications', ['id' => $input['teacher_id']])
            ];
        }

        return [
            'status' => 'failed',
            'message' => __('messages.teacher_qualifications.create.failed'),
            'route' => route('teacher.qualifications', ['id' => $input['teacher_id']])
        ];
    }

    public function getTeacherQualification(int $id): array
    {
        return $this->teacherQualification->where('id', $id)->first()->toArray();
    }

    public function update(array $input): array
    {
        $teacherQualification = $this->teacherQualification->where('id', $input['id'])->first();
        if ($teacherQualification->update($input))
        {
            return [
                'status' => 'success',
                'message' => __('messages.teacher_qualifications.update.success'),
                'route' => route('teacher.qualifications', ['id' => $input['teacher_id']])
            ];
        }

        return [
            'status' => 'failed',
            'message' => __('messages.teacher_qualifications.update.failed'),
            'route' => route('teacher.qualifications', ['id' => $input['teacher_id']])
        ];
    }

    public function delete(int $id): array
    {
        $teacherQualification = $this->teacherQualification->where('id', $id)->first();
        if ($teacherQualification->delete())
        {
            return [
                'status' => 'success',
                'message' => __('messages.teacher_qualifications.delete.success'),
                'route' => route('teacher.qualifications', ['id' => $teacherQualification->teacher_id])
            ];
        }

        return [
            'status' => 'failed',
            'message' => __('messages.teacher_qualifications.delete.failed'),
            'route' => route('teacher.qualifications', ['id' => $teacherQualification->teacher_id])
        ];
    }
}
