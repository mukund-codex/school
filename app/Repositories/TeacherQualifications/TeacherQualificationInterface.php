<?php

namespace App\Repositories\TeacherQualifications;

interface TeacherQualificationInterface
{
    public function index(int $teacherId): array;

    public function create(array $input): array;

    public function getTeacherQualification(int $id): array;

    public function update(array $input): array;

    public function delete(int $id): array;
}
