<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentDetailRequest;
use App\Http\Requests\DeleteStudentDetailRequest;
use App\Http\Requests\GetStudentDetailRequest;
use App\Http\Requests\StudentDetailRequest;
use App\Http\Requests\UpdateStudentDetailRequest;
use App\Repositories\StudentDetails\StudentDetailsRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class StudentDetailsController extends Controller
{
    private StudentDetailsRepository $studentDetailsRepository;

    public function __construct(StudentDetailsRepository $studentDetailsRepository)
    {
        $this->studentDetailsRepository = $studentDetailsRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(StudentDetailRequest $request): View|Application|Factory
    {
        $details = $this->studentDetailsRepository->index($request->validated('id'));
        return view($details['route'])->with('details', $details['data']);
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
    public function store(AddStudentDetailRequest $request): RedirectResponse
    {
        $response = $this->studentDetailsRepository->create($request->validated());
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
    public function edit(GetStudentDetailRequest $request): View|Application|Factory
    {
        $details = $this->studentDetailsRepository->getStudentDetail($request->validated('id'));
        return view($details['route'])->with('detail', $details['data']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentDetailRequest $request): RedirectResponse
    {
        $response = $this->studentDetailsRepository->update($request->validated());
        return redirect($response['route'])->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteStudentDetailRequest $request): Application|Redirector|RedirectResponse
    {
        $response = $this->studentDetailsRepository->delete($request->validated('id'));
        return redirect($response['route'])->with($response['status'], $response['message']);
    }
}
