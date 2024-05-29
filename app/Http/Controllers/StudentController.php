<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\changeStudentStatusRequest;
use App\Http\Requests\DeleteStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\Students\StudentRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $students = $this->studentRepository->getStudentList();
        return view('students.index')->with('students', $students);
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
    public function store(AddStudentRequest $request): RedirectResponse
    {
        $response = $this->studentRepository->store($request->validated(), $request->file());
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
        $student = $this->studentRepository->getStudentData($id);
        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request): RedirectResponse
    {
        $response = $this->studentRepository->update($request->validated(), $request->file());
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteStudentRequest $request): RedirectResponse
    {
        $response = $this->studentRepository->delete($request->validated('id'));
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    public function changeStatus(ChangeStudentStatusRequest $request): RedirectResponse
    {
        $response = $this->studentRepository->changeStatus($request->validated('id'));
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }
}
