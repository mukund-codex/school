<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddLeaveRequest;
use App\Http\Requests\ChangeLeaveStatusRequest;
use App\Http\Requests\DeleteLeaveRequest;
use App\Http\Requests\GetLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Repositories\Leaves\LeaveRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    private LeaveRepository $leaveRepository;

    public function __construct(LeaveRepository $leaveRepository)
    {
        $this->leaveRepository = $leaveRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $leaves = $this->leaveRepository->index();
        return view('teacher.leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddLeaveRequest $request): RedirectResponse
    {
        $this->leaveRepository->store($request->validated());
        return redirect()->route('leaves.list')->with('success', 'Leave added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GetLeaveRequest $request): View|Application|Factory
    {
        $leave = $this->leaveRepository->getLeave($request->validated('id'));
        return view('teacher.leaves.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequest $request): RedirectResponse
    {
        $this->leaveRepository->update($request->validated());
        return redirect()->route('leaves.list')->with('success', 'Leave updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteLeaveRequest $request): RedirectResponse
    {
        $this->leaveRepository->delete($request->validated('id'));
        return redirect()->route('leaves.list')->with('success', 'Leave deleted successfully.');
    }

    public function changeStatus(ChangeLeaveStatusRequest $request): RedirectResponse
    {
        $this->leaveRepository->changeStatus($request->all());
        return redirect()->route('leaves.list')->with('success', 'Leave status changed successfully.');
    }
}
