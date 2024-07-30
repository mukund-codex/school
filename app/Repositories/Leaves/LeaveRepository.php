<?php

namespace App\Repositories\Leaves;

use App\Models\Leaves;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use App\Services\ScheduleService;

class LeaveRepository implements LeaveInterface
{
    protected Leaves $leave;
    protected ScheduleService $scheduleService;
    public function __construct(Leaves $leave, ScheduleService $scheduleService)
    {
        $this->leave = $leave;
        $this->scheduleService = $scheduleService;
    }

    public function index(): Collection
    {
        if(Auth::user()->role === 'admin') {
            return $this->leave->with(['teacher', 'approvedBy', 'rejectedBy', 'canceledBy', 'resumedBy'])->orderBy('id', 'desc')->get();
        }

        return $this->leave->where('teacher_id', Auth::id())->with('teacher')->orderBy('id', 'desc')->get();
    }

    public function store(array $data): void
    {
        $this->leave->create([
            'teacher_id' => Auth::id(),
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'type' => $data['type'],
            'reason' => $data['reason'],
            'comment' => $data['comment'],
        ]);
    }

    public function getLeave(int $id): Leaves
    {
        return $this->leave->findOrFail($id);
    }

    public function update(array $data): void
    {
        $data['teacher_id'] = Auth::id();
        $this->leave->findOrFail($data['id'])->update($data);
    }

    public function delete(int $id): void
    {
        $this->leave->findOrFail($id)->delete();
    }

    public function changeStatus(array $data): void
    {
        $leave = $this->leave->findOrFail($data['id']);
        $leave->update([
            'status' => $data['status'],
            $data['status'] . '_at' => now(),
            $data['status'] . '_by' => Auth::id(),
        ]);

//        if($data['status'] == 'approved') {
//            $this->scheduleService->updateSchedule($leave->teacher_id);
//        }
    }
}
