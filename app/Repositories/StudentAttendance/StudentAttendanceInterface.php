<?php

namespace App\Repositories\StudentAttendance;

interface StudentAttendanceInterface
{
    public function index(): array;

    public function create(array $input): array;
}
