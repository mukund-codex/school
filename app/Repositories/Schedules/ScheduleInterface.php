<?php

namespace App\Repositories\Schedules;

use Illuminate\Database\Eloquent\Collection;

interface ScheduleInterface
{
    public function index(): Collection;
}
