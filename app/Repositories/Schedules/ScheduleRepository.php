<?php

namespace App\Repositories\Schedules;

use App\Models\Classes;
use App\Models\Schedules;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ScheduleRepository implements ScheduleInterface
{
    private Schedules $schedules;

    public function __construct(Schedules $schedules)
    {
        $this->schedules = $schedules;
    }

    public function index(): Collection
    {
        return $this->schedules::with('teacher', 'class', 'division', 'subject')->get();
    }

    public function getTeachers(): Collection
    {
        return User::where('role', 'teacher')->get();
    }

    public function getClasses(): Collection
    {
        return Classes::all();
    }

    public function getSubjects(): Collection
    {
        return Subjects::all();
    }

    public function store(array $request): void
    {
        if (! $request['date'])
        {
            $request['date'] = date('Y-m-d');
        }

        $this->schedules->create($request);
    }

    public function getSchedule(int $id): Collection
    {
        return $this->schedules::with('teacher', 'class', 'division', 'subject')->where('id', $id)->get();
    }

    public function delete(int $id): void
    {
        $this->schedules::where('id', $id)->delete();
    }
}
