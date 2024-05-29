<?php

namespace App\Repositories\TeacherExperiences;

interface  TeacherExperienceInterface
{
    public function index(int $teacher_id): array;

    public function create(array $input): array;

    public function getTeacherExperience(int $id): array;

    public function update(array $input):array;

    public function delete(int $id): array;
}
