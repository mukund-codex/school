<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentClassMappingRequest;
use App\Http\Requests\DeleteStudentClassMappingRequest;
use App\Http\Requests\GetDivisionsListRequest;
use App\Http\Requests\GetStudentClassMappingRequest;
use App\Repositories\StudentClassMapping\StudentClassMappingRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class StudentClassMappingController extends Controller
{
    private StudentClassMappingRepository $studentClassMappingRepository;

    public function __construct(StudentClassMappingRepository $studentClassMappingRepository)
    {
        $this->studentClassMappingRepository = $studentClassMappingRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $mapping = $this->studentClassMappingRepository->index();
        return view('students.student-class-mapping.index', compact('mapping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        $students = $this->studentClassMappingRepository->getStudents();
        $classes = $this->studentClassMappingRepository->getClasses();
        return view('students.student-class-mapping.add', compact('students', 'classes'));
    }

    public function getDivisions(GetDivisionsListRequest $request): JsonResponse
    {
        $divisions = $this->studentClassMappingRepository->getDivisions($request->validated('id'));
        return response()->json($divisions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddStudentClassMappingRequest $request): Application|Redirector|RedirectResponse
    {
        $response = $this->studentClassMappingRepository->create($request->validated());
        return redirect($response['route'])->with($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(GetStudentClassMappingRequest $request)
    {
        $response = $this->studentClassMappingRepository->show($request->validated());
        return view('students.student-class-mapping.show', compact('response'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteStudentClassMappingRequest $request): Application|Redirector|RedirectResponse
    {
        $response = $this->studentClassMappingRepository->destroy($request->validated('id'));
        return redirect($response['route'])->with($response['status'], $response['message']);
    }
}
