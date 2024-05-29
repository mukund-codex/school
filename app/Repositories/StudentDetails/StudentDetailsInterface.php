<?php

namespace App\Repositories\StudentDetails;

interface StudentDetailsInterface
{
    public function index(int $id): array;

    public function create(array $data): array;

    public function delete(int $id): array;

    public function getStudentDetail(int $id): array;

    public function update(array $data): array;
}
