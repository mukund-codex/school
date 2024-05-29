<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherExperienceRequest;
use App\Http\Requests\DeleteTeacherExperienceRequest;
use App\Http\Requests\GetTeacherExperienceRequest;
use App\Http\Requests\TeacherExperienceRequest;
use App\Http\Requests\UpdateTeacherExperienceRequest;
use App\Repositories\TeacherExperiences\TeacherExperienceRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class TeacherExperienceController extends Controller
{
    private TeacherExperienceRepository $teacherExperienceRepository;

    public function __construct(TeacherExperienceRepository $teacherExperienceRepository)
    {
        $this->teacherExperienceRepository = $teacherExperienceRepository;
    }

    public function index(TeacherExperienceRequest $request): View|Application|Factory
    {
        $experiences = $this->teacherExperienceRepository->index($request->validated('id'));
        return view('teacher.experience.index')->with('experiences', $experiences);
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
    public function store(AddTeacherExperienceRequest $request): Application|Redirector|RedirectResponse
    {
        $response = $this->teacherExperienceRepository->create($request->validated());
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
    public function edit(GetTeacherExperienceRequest $request): View|Application|Factory
{
        $experience = $this->teacherExperienceRepository->getTeacherExperience($request->validated('id'));
        return view('teacher.experience.edit')->with('experience', $experience);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherExperienceRequest $request): Application|Redirector|RedirectResponse
{
        $response = $this->teacherExperienceRepository->update($request->validated());
        return redirect($response['route'])->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTeacherExperienceRequest $request)
    {
        $response = $this->teacherExperienceRepository->delete($request->validated('id'));
        return redirect($response['route'])->with($response['status'], $response['message']);
    }
}
