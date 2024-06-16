<?php

namespace App\Repositories\Schedules;

use App\Models\Schedules;
use Illuminate\Database\Eloquent\Collection;

interface ScheduleInterface
{
    public function index(): Collection;

    public function getTeachers(): Collection;

    public function getClasses(): Collection;

    public function getSubjects(): Collection;

    public function store(array $request): void;

    public function getSchedule(int $id): Collection;

    public function delete(int $id): void;
}
