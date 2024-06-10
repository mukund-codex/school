<?php

namespace App\Repositories\Subjects;

use App\Models\Subjects;
use Illuminate\Database\Eloquent\Collection;

class SubjectRepository implements SubjectInterface
{
    private Subjects $subjects;

    public function __construct(Subjects $subjects)
    {
        $this->subjects = $subjects;
    }

    public function index(): Collection
    {
        return $this->subjects->all();
    }

    public function store(array $input): void
    {
        $this->subjects->create($input);
    }

    public function edit(int $id): Subjects
    {
        return $this->subjects->find($id);
    }

    public function update(array $input, int $id)
    {
        $subject = $this->subjects->find($id);
        $subject->update($input);
    }

    public function destroy(int $id): void
    {
        $this->subjects->destroy($id);
    }
}
