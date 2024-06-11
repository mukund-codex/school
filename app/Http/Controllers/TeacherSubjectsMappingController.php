<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherSubjectMappingRequest;
use App\Http\Requests\DeleteTeacherSubjectsMappingRequest;
use App\Http\Requests\GetTeacherSubjectsMappingRequest;
use App\Http\Requests\UpdateTeacherSubjectsMappingRequest;
use App\Repositories\TeacherSubjectsMapping\TeacherSubjectsMappingRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherSubjectsMappingController extends Controller
{
    private TeacherSubjectsMappingRepository $teacherSubjectsMappingRepository;

    public function __construct(TeacherSubjectsMappingRepository $teacherSubjectsMappingRepository)
    {
        $this->teacherSubjectsMappingRepository = $teacherSubjectsMappingRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $teacherSubjectsMapping = $this->teacherSubjectsMappingRepository->index();
        return view('teacher.teacher-subjects-mapping.index', compact('teacherSubjectsMapping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = $this->teacherSubjectsMappingRepository->getSubjects();
        $teachers = $this->teacherSubjectsMappingRepository->getTeachers();
        return view('teacher.teacher-subjects-mapping.add', compact('subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddTeacherSubjectMappingRequest $request): RedirectResponse
    {
        $this->teacherSubjectsMappingRepository->store($request->validated());
        return redirect()->route('teacher.subject.mapping');
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
    public function edit(GetTeacherSubjectsMappingRequest $request): View|Application|Factory
    {
        $subjects = $this->teacherSubjectsMappingRepository->getSubjects();
        $teachers = $this->teacherSubjectsMappingRepository->getTeachers();
        $teacherSubjectsMapping = $this->teacherSubjectsMappingRepository->edit($request->validated('id'));
        return view('teacher.teacher-subjects-mapping.edit', compact('teacherSubjectsMapping', 'subjects', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherSubjectsMappingRequest $request): RedirectResponse
    {
        $this->teacherSubjectsMappingRepository->update($request->validated(), $request->validated('id'));
        return redirect()->route('teacher.subject.mapping');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTeacherSubjectsMappingRequest $request)
    {
        $this->teacherSubjectsMappingRepository->delete($request->validated('id'));
        return redirect()->route('teacher.subject.mapping');
    }
}
