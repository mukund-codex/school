<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherDetailRequest;
use App\Http\Requests\GetTeacherDetailRequest;
use App\Http\Requests\TeacherDetailRequest;
use App\Http\Requests\UpdateTeacherDetailRequest;
use App\Repositories\TeacherDetails\TeacherDetailRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherDetailsController extends Controller
{
    private TeacherDetailRepository $teacherDetailRepository;

    public function __construct(TeacherDetailRepository $teacherDetailRepository)
    {
        $this->teacherDetailRepository = $teacherDetailRepository;
    }

    public function index(TeacherDetailRequest $request): View
    {
        $details = $this->teacherDetailRepository->index($request->validated('id'));
        return view($details['route'])->with('details', $details['data']);
    }

    public function store(AddTeacherDetailRequest $request): RedirectResponse
    {
        $response = $this->teacherDetailRepository->store($request->validated());
        return redirect()->route( 'teacher.details/' . $request->validated('teacher_id'),)->with($response['status'], $response['message']);
    }

    public function edit(GetTeacherDetailRequest $request): View|Application|Factory
    {
        $response = $this->teacherDetailRepository->getTeacherDetail($request->validated('id'));
        return view($response['route'])->with('detail', $response['data']);
    }

    public function update(UpdateTeacherDetailRequest $request): RedirectResponse
    {
        $response = $this->teacherDetailRepository->update($request->validated());
        return redirect($response['route'])->with($response['status'], $response['message']);
    }
}
