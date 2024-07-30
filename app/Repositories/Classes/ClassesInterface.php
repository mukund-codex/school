<?php

namespace App\Repositories\Classes;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface ClassesInterface
{
    public function index(): Collection;

    public function store(array $input): array;

    public function changeStatus(int $id);

    public function getClasses(int $id);

    public function update(array $input): array;

    public function delete(int $id): array;

    public function upload(array $input): RedirectResponse;
}
