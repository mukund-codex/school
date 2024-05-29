<?php

namespace App\Repositories\Teacher;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface TeacherInterface
{
    public function changeStatus(int $id): array;

    public function create(array $data, array $file): array;

    public function update(array $data, array $file): array;

    public function getTeacherData(int $id): User;

    public function delete(int $id): array;
}
