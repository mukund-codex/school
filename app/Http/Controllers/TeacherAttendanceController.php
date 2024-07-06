<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTeacherAttendanceRequest;
use App\Repositories\TeacherAttendance\TeacherAttendanceRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherAttendanceController extends Controller
{
    private TeacherAttendanceRepository $teacherAttendanceRepository;

    public function __construct(TeacherAttendanceRepository $teacherAttendanceRepository)
    {
        $this->teacherAttendanceRepository = $teacherAttendanceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        $attendance = $this->teacherAttendanceRepository->index();
        return view('teacher.attendance.index', compact('attendance'));
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
    public function update(UpdateTeacherAttendanceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['date'] = $request->validated('attendance_date');
        $data['created_by'] = Session::get('id');
        $data['updated_by'] = Session::get('id');
        $data['status'] = $request->validated('attendance');
        $this->teacherAttendanceRepository->create($data);
        return redirect()->route('teachers.attendance')->with('success', 'Attendance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
