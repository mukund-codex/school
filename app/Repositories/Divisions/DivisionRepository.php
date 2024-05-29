<?php

namespace App\Repositories\Divisions;

use App\Models\Divisions;

class DivisionRepository implements DivisionInterface
{
    private Divisions $division;

    public function __construct(Divisions $division)
    {
        $this->division = $division;
    }

    public function index(int $class_id): array
    {
        return $this->division->where('class_id', $class_id)->get()->toArray();
    }

    public function store(array $input): array
    {
        $classes = $this->division->create($input);
        return [
            'route' => 'classes.divisions.list',
            'status' => 'success',
            'message' => 'Class created successfully'
        ];
    }

    public function getDivision(int $id): array
    {
        return $this->division->where('id', $id)->first()->toArray();
    }

    public function update(array $input): array
    {
        $division = $this->division->where('id', $input['id'])->first();
        $division->update($input);

        return [
            'route' => 'classes.divisions.list',
            'status' => true,
            'message' => 'Division updated successfully.'
        ];
    }

    public function delete(int $id): int
    {
        $class = $this->division->where('id', $id)->first();
        $class_id = $class->class_id;
        $class->delete();
        return $class_id;
    }
}
