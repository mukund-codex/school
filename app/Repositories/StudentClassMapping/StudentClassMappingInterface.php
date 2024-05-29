<?php

namespace App\Repositories\StudentClassMapping;

use Illuminate\Database\Eloquent\Collection;

interface StudentClassMappingInterface
{
    public function index(): Collection;

    public function getClasses(): Collection;

    public function getDivisions(int $class_id): Collection;

    public function getStudents(): Collection;

    public function create(array $input): array;

    public function show(int $id): array;

    public function destroy(int $id): array;
}
