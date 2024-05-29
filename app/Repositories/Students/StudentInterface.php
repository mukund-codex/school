<?php

namespace App\Repositories\Students;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface StudentInterface
{
    public function getStudentList(): Collection;

    public function store(array $input, array $file): array;

    public function getStudentData(int $id): User;

    public function update(array $input, array $file): array;

    public function delete(int $id): array;

    public function changeStatus(int $id): array;
}
