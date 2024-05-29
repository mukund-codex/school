<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClassesRequest;
use App\Http\Requests\ChangeClassStatusRequest;
use App\Http\Requests\DeleteClassesRequest;
use App\Http\Requests\GetClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use App\Repositories\Classes\ClassesRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    private ClassesRepository $classesRepository;

    public function __construct(ClassesRepository $classesRepository)
    {
        $this->classesRepository = $classesRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $classes = $this->classesRepository->index();
        return view('classes.index', compact('classes'));
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
    public function store(AddClassesRequest $request)
    {
        $response = $this->classesRepository->store($request->validated());
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
    public function edit(GetClassesRequest $request)
    {
        $class = $this->classesRepository->getClasses($request->validated('id'));
        return view('classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassesRequest $request): RedirectResponse
    {
        $response = $this->classesRepository->update($request->validated());
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteClassesRequest $request): RedirectResponse
    {
        $response = $this->classesRepository->delete($request->validated('id'));
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    public function changeStatus(ChangeClassStatusRequest $request): RedirectResponse
    {
        $response = $this->classesRepository->changeStatus($request->validated()['id']);
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }
}
