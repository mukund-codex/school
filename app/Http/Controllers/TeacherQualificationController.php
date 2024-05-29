<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherQualificationRequest;
use App\Http\Requests\DeleteTeacherQualificationRequest;
use App\Http\Requests\GetTeacherQualificationRequest;
use App\Http\Requests\TeacherQualificationsRequest;
use App\Http\Requests\UpdateTeacherQualificationRequest;
use App\Repositories\TeacherQualifications\TeacherQualificationRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class  TeacherQualificationController extends Controller
{
    private TeacherQualificationRepository $teacherQualificationRepository;

    public function __construct(TeacherQualificationRepository $teacherQualificationRepository)
    {
        $this->teacherQualificationRepository = $teacherQualificationRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(TeacherQualificationsRequest $request): View|Application|Factory
    {
        $qualifications = $this->teacherQualificationRepository->index($request->validated('id'));
        return view('teacher.qualification.index')->with('qualifications', $qualifications);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddTeacherQualificationRequest $request): Application|Redirector|RedirectResponse
    {
        $response = $this->teacherQualificationRepository->create($request->validated());
        return redirect($response['route'])->with($response['status'], $response['message']);
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
    public function edit(GetTeacherQualificationRequest $request)
    {
        $qualification = $this->teacherQualificationRepository->getTeacherQualification($request->validated('id'));
        return view('teacher.qualification.edit')->with('qualification', $qualification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherQualificationRequest $request): Application|Redirector|RedirectResponse
    {
        $response = $this->teacherQualificationRepository->update($request->validated());
        return redirect($response['route'])->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTeacherQualificationRequest $request): Application|Redirector|RedirectResponse
    {
        $response = $this->teacherQualificationRepository->delete($request->validated('id'));
        return redirect()->back()->with($response['status'], $response['message']);
    }
}
