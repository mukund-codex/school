<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherRequest;
use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\DeleteTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use App\Repositories\Teacher\TeacherRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    private UserRepository $userRepository;
    private TeacherRepository $teacherRepository;

    public function __construct(UserRepository $userRepository, TeacherRepository $teacherRepository)
    {
        $this->userRepository = $userRepository;
        $this->teacherRepository = $teacherRepository;
    }

    public function index(): View
    {
        $teachers = $this->userRepository->getTeachersList();
        return view('teacher.index')->with('teachers', $teachers);
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
    public function store(AddTeacherRequest $request): RedirectResponse
    {
        $response = $this->teacherRepository->create($request->validated(), $request->file());
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
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
    public function edit(string $id): View|Application|Factory
    {
        $teacher = $this->teacherRepository->getTeacherData($id);
        return view('teacher.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request): RedirectResponse
    {
        $response = $this->teacherRepository->update($request->validated(), $request->file());
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTeacherRequest $request): RedirectResponse
    {
        $response = $this->teacherRepository->delete($request->validated('id'));
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    public function changeStatus(ChangeStatusRequest $request): RedirectResponse
    {
        $response = $this->teacherRepository->changeStatus($request->validated('id'));
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }
}
