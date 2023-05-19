<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DepartmentRepository;
use App\Http\Resources\DepartmentResource;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct(private DepartmentRepository $departmentRepository)
    {

    }

    public function index(Request $request) // search with department name change search from false to variable $name in the function
    {
        $name = $request->name;
        $departments = $this->departmentRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        return DepartmentResource::collection($departments);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $data = $request->validated();
        $this->departmentRepository->store($data);
        return response()->json(['message' => 'Department Created Successfully']);
    }

    public function update(UpdateDepartmentRequest $request , $id)
    {
        $data = $request->validated();
        $this->departmentRepository->update($data , $id);
        return response()->json(['message' => 'Department Updated Successfully']);
    }

    public function destroy($id)
    {
        $this->authorize('delete_department' , $id);
        $this->departmentRepository->destroy($id);
        return response()->json(['message' => 'Department Deleted Successfully']);
    }
}
