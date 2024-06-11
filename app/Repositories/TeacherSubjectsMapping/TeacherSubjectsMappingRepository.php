<?php

namespace App\Repositories\TeacherSubjectsMapping;

use App\Models\Subjects;
use App\Models\TeacherSubjectsMapping;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TeacherSubjectsMappingRepository implements TeacherSubjectsMappingInterface
{
    private TeacherSubjectsMapping $teacherSubjectsMapping;

    public function __construct(TeacherSubjectsMapping $teacherSubjectsMapping)
    {
        $this->teacherSubjectsMapping = $teacherSubjectsMapping;
    }

    public function index(): Collection
    {
        return $this->teacherSubjectsMapping->all()->load('teacher', 'subject');
    }

    public function getSubjects(): Collection
    {
        return Subjects::all();
    }

    public function getTeachers(): Collection
    {
        return User::where('role', config('constants.ROLE.TEACHER'))
            ->where('status', true)->get();
    }

    public function store(array $data): void
    {
        $this->teacherSubjectsMapping->create($data);
    }

    public function edit(int $id): TeacherSubjectsMapping
    {
        return $this->teacherSubjectsMapping->where('id', $id)->first();
    }

    public function update(array $data, int $id): void
    {
        $this->teacherSubjectsMapping->where('id', $id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->teacherSubjectsMapping->where('id', $id)->delete();
    }
}
