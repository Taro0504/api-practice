<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeFamily;
use App\Http\Resources\EmployeeFamilyResource;
use App\Http\Requests\EmployeeFamilyRequest;

class EmployeeFamilyController extends Controller
{
    public function index()
    {
        return EmployeeFamilyResource::collection(EmployeeFamily::all());
    }

    public function show(EmployeeFamily $employeeFamily)
    {
        return new EmployeeFamilyResource($employeeFamily);
    }

    public function store(EmployeeFamilyRequest $request)
    {
        $employeeFamily = EmployeeFamily::create($request->validated());
        return new EmployeeFamilyResource($employeeFamily);
    }

    public function update(EmployeeFamilyRequest $request, EmployeeFamily $employeeFamily)
    {
        $employeeFamily->update($request->validated());
        return new EmployeeFamilyResource($employeeFamily);
    }

    public function destroy(EmployeeFamily $employeeFamily)
    {
        $employeeFamily->delete();
        return response(null, 204);
    }
}
