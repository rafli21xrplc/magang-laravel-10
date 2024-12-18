<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Models\employee;
use App\Services\EmployeeService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class EmployeeRepository extends BaseRepository implements EmployeeInterface
{
    private EmployeeService $EmployeeService;
    public function __construct(employee $employee, EmployeeService $EmployeeService)
    {
        $this->EmployeeService = $EmployeeService;
        $this->model = $employee;
    }


    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        try {
            $this->show($id)->delete($id);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) return false;
        }

        return true;
    }
}
