<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function loginHandler(LoginRequest $request): RedirectResponse
    {
        $response = $this->userRepository->loginHandler($request->validated());
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    public function registerHandler(RegisterRequest $request): RedirectResponse
    {
        $response = $this->userRepository->registerHandler($request->validated(), $request->file());
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    public function logoutHandler(): RedirectResponse
    {
        $response = $this->userRepository->logoutHandler();
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    public function dashboard(): View
    {
        $dashboard = $this->userRepository->dashboardData();
        return view('dashboard')->with('dashboard', $dashboard);
    }

    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
