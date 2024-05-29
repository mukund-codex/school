<?php

namespace App\Repositories\TeacherDetails;

interface TeacherDetailInterface
{
    public function index(int $id): array;

    public function store(array $data): array;

    public function getTeacherDetail(int $id): array;

    public function update(array $data): array;
}
