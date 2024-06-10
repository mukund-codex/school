<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSubjectRequest;
use App\Http\Requests\DeleteSubjectRequest;
use App\Http\Requests\GetSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Repositories\Subjects\SubjectRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private SubjectRepository $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $subjects = $this->subjectRepository->index();
        return view('subjects.index', compact('subjects'));
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
    public function store(AddSubjectRequest $request): RedirectResponse
    {
        $this->subjectRepository->store($request->validated());
        return redirect()->route('subjects.list');
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
    public function edit(GetSubjectRequest $request): View|Application|Factory
    {
        $subject = $this->subjectRepository->edit($request->validated('id'));
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request): RedirectResponse
    {
        $this->subjectRepository->update($request->validated(), $request->validated('id'));
        return redirect()->route('subjects.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSubjectRequest $request): RedirectResponse
    {
        $this->subjectRepository->destroy($request->validated('id'));
        return redirect()->route('subjects.list');
    }
}
