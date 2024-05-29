<?php

namespace App\Repositories\TeacherExperiences;

use App\Models\TeacherExperience;

class TeacherExperienceRepository implements TeacherExperienceInterface
{

    private TeacherExperience $teacherExperience;

    public function __construct(TeacherExperience $teacherExperience)
    {
        $this->teacherExperience = $teacherExperience;
    }

    public function index(int $teacher_id): array
    {
        return $this->teacherExperience->where('teacher_id', $teacher_id)->get()->toArray();
    }

    public function create(array $input): array
    {
        if ($input['end_month'] == 'Select Month') {
            $input['end_month'] = null;
        }
        if ($input['end_year'] == 'Select Year') {
            $input['end_year'] = null;
        }

        $this->teacherExperience->create($input);
        return [
            'route' => route('teacher.experiences', ['id' => $input['teacher_id']]),
            'status' => 'success',
            'message' => 'Experience added successfully'
        ];
    }

    public function getTeacherExperience(int $id): array
    {
        return $this->teacherExperience->where('id', $id)->first()->toArray();
    }

    public function update(array $input): array
    {
        if ($input['end_month'] == 'Select Month') {
            $input['end_month'] = null;
        }
        if ($input['end_year'] == 'Select Year') {
            $input['end_year'] = null;
        }

        $experience = $this->teacherExperience->where('id', $input['id'])->first();
        if ($experience->update($input)) {
            return [
                'route' => route('teacher.experiences', ['id' => $input['teacher_id']]),
                'status' => 'success',
                'message' => 'Experience updated successfully'
            ];
        }

        return [
            'route' => route('teacher.experiences', ['id' => $input['teacher_id']]),
            'status' => 'error',
            'message' => 'Experience not updated'
        ];
    }

    public function delete(int $id): array
    {
        $experience = $this->teacherExperience->where('id', $id)->first();
        if ($experience->delete()) {
            return [
                'route' => route('teacher.experiences', ['id' => $experience->teacher_id]),
                'status' => 'success',
                'message' => 'Experience deleted successfully'
            ];
        }

        return [
            'route' => route('teacher.experiences', ['id' => $experience->teacher_id]),
            'status' => 'error',
            'message' => 'Experience not deleted'
        ];
    }
}
