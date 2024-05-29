<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAttendanceRequest;
use App\Repositories\StudentAttendance\StudentAttendanceRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentAttendanceController extends Controller
{
    private StudentAttendanceRepository $studentAttendanceRepository;

    public function __construct(StudentAttendanceRepository $studentAttendanceRepository)
    {
        $this->studentAttendanceRepository = $studentAttendanceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $attendance = $this->studentAttendanceRepository->index();
        return view('students.attendance.index', compact('attendance'));
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
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['date'] = $request->validated('attendance_date');
        $data['created_by'] = Session::get('id');
        $data['status'] = $request->validated('attendance');
        $this->studentAttendanceRepository->create($data);
        return redirect()->route('students.attendance')->with('success', 'Attendance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
