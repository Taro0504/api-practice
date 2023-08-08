<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\EmployeeRequest;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        return new EmployeeResource($employee);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response(null, 204);
    }
}
