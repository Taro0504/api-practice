<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Http\Resources\WorkerResource;

class WorkerController extends Controller
{
    
    public function index()
    {
        $workers = Worker::all();
        return $workers;
    }

    public function show(Worker $worker)
    {
        return new WorkerResource($worker);
    }

    public function store(Request $request)
    {
        $worker = Worker::create($request->all());
        return new WorkerResource($worker);
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return response(null, 204);
    }

}
