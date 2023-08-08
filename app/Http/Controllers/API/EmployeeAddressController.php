<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeAddress;
use App\Http\Resources\EmployeeAddressResource;
use App\Http\Requests\EmployeeAddressRequest;

class EmployeeAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $addresses = EmployeeAddress::all();
        return EmployeeAddressResource::collection($addresses);
    }

    public function show(EmployeeAddress $address)
    {
        return new EmployeeAddressResource($address);
    }

    public function store(EmployeeAddressRequest $request)
    {
        $address = EmployeeAddress::create($request->validated());
        return new EmployeeAddressResource($address);
    }

    public function update(EmployeeAddressRequest $request, EmployeeAddress $address)
    {
        $address->update($request->validated());
        return new EmployeeAddressResource($address);
    }

    public function destroy(EmployeeAddress $address)
    {
        $address->delete();
        return response(null, 204);
    }
}
