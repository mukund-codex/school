<?php

namespace App\Repositories\Divisions;

interface DivisionInterface
{
    public function index(): array;

    public function store(array $input): array;

    public function getDivision(int $id): array;

    public function update(array $input): array;

    public function delete(int $id): int;

    public function getClasses(): array;
}
