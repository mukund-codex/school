<?php

namespace App\Repositories\Leaves;

use App\Models\Leaves;

interface LeaveInterface
{
    public function index();

    public function store(array $data);

    public function getLeave(int $id): Leaves;

    public function update(array $data);

    public function delete(int $id);

    public function changeStatus(array $data);
}
