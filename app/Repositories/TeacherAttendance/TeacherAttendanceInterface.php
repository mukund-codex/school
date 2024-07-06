<?php

namespace  App\Repositories\TeacherAttendance;

use Illuminate\Database\Eloquent\Collection;

interface TeacherAttendanceInterface
{
    public function index(): Collection|array;

    public function create(array $input): array;
}
