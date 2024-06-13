<?php

namespace App\Repositories\Schedules;

use App\Models\Schedules;
use Illuminate\Database\Eloquent\Collection;

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
}
