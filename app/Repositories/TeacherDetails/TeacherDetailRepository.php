<?php

namespace App\Repositories\TeacherDetails;

use App\Models\TeacherDetail;
use App\Models\User;

class TeacherDetailRepository implements TeacherDetailInterface
{
    private User $user;
    private TeacherDetail $teacherDetail;

    public function __construct(User $user, TeacherDetail $teacherDetail)
    {
        $this->user = $user;
        $this->teacherDetail = $teacherDetail;
    }
    public function index(int $id):array
    {
        $data = TeacherDetail::where('teacher_id', $id)->get()->toArray();
        return [
            'data' => $data,
            'message' => __('messages.teacher_details.index'),
            'status' => 'success',
            'route' => 'teacher.details.index'
        ];
    }

    public function store(array $data): array
    {
        $teacher = $this->user->find($data['teacher_id']);
        if ($teacher) {
            TeacherDetail::create($data);
            return [
                'message' => __('messages.teacher_details.create.success'),
                'status' => 'success',
                'route' => 'teacher.details.index'
            ];
        }

        return [
            'message' => __('messages.teacher_details.create.failed'),
            'status' => 'failed',
            'route' => 'teacher.details.add'
        ];
    }

    public function getTeacherDetail(int $id): array
    {
        $data = $this->teacherDetail->where('id', $id)->first();
        return [
            'route' => 'teacher.details.edit',
            'data' => $data
        ];
    }

    public function update(array $data): array
    {
        $teacherDetail = $this->teacherDetail->where('id', $data['id'])->first();
        if ($teacherDetail->update($data))
        {
            return [
                'route' => route('teacher.details', ['id' => $teacherDetail->teacher_id]),
                'teacher_id' => $teacherDetail->teacher_id,
                'status' => 'success',
                'message' => __('messages.teacher_details.update.success')
            ];
        }

        return [
            'route' => route('teacher.details.edit', ['id' => $teacherDetail->id]),
            'teacher_id' => $teacherDetail->teacher_id,
            'status' => 'failed',
            'message' => __('messages.teacher_details.update.failed')
        ];
    }
}
