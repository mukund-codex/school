<?php

namespace App\Repositories\Subjects;

use App\Models\Subjects;
use Illuminate\Database\Eloquent\Collection;

interface SubjectInterface
{
    public function index(): Collection;
    public function store(array $input);
    public function edit(int $id): Subjects;
    public function update(array $input, int $id);
    public function destroy(int $id): void;
}
