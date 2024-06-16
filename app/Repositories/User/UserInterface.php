<?php

namespace App\Repositories\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserInterface
{
    public function loginHandler(array $data): array;

    public function registerHandler(array $data, array $file): array;

    public function getTeachersList(): Collection;

    public function logoutHandler(): array;

    public function dashboardData(): array;
}
