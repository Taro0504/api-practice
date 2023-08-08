<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeBankDetail;
use App\Http\Resources\EmployeeBankDetailResource;
use App\Http\Requests\EmployeeBankDetailRequest;

class EmployeeBankDetailController extends Controller
{
    public function index()
    {
        return EmployeeBankDetailResource::collection(EmployeeBankDetail::all());
    }

    public function show(EmployeeBankDetail $employeeBankDetail)
    {
        return new EmployeeBankDetailResource($employeeBankDetail);
    }

    public function store(EmployeeBankDetailRequest $request)
    {
        $employeeBankDetail = EmployeeBankDetail::create($request->validated());
        return new EmployeeBankDetailResource($employeeBankDetail);
    }

    public function update(EmployeeBankDetailRequest $request, EmployeeBankDetail $employeeBankDetail)
    {
        $employeeBankDetail->update($request->validated());
        return new EmployeeBankDetailResource($employeeBankDetail);
    }

    public function destroy(EmployeeBankDetail $employeeBankDetail)
    {
        $employeeBankDetail->delete();
        return response(null, 204);
    }
}
