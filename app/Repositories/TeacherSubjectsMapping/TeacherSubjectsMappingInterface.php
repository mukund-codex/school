<?php

namespace App\Repositories\TeacherSubjectsMapping;

use App\Models\TeacherSubjectsMapping;
use Illuminate\Database\Eloquent\Collection;

interface TeacherSubjectsMappingInterface
{
    public function index(): Collection;

    public function getSubjects(): Collection;

    public function getTeachers(): Collection;

    public function store(array $data): void;

    public function edit(int $id): TeacherSubjectsMapping;

    public function update(array $data, int $id): void;

    public function delete(int $id): void;
}
