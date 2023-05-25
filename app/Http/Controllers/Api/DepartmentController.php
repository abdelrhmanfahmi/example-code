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

    public function searchDepartments(Request $request)
    {
        $departments = $this->departmentRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        if($request->name){
            $departments = $this->departmentRepository->get(['name' => $request->name] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        }
        return view('departments.index' , ['departments' => $departments]);
    }

    public function index() // search with department name change search from false to variable $name in the function
    {
        $departments = $this->departmentRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        return view('departments.index' , ['departments' => $departments]);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $data = $request->validated();
        $this->departmentRepository->store($data);
        return redirect()->route('departments.index');
    }

    public function edit($id)
    {
        $department = $this->departmentRepository->find($id);
        return view('departments.edit' , ['department' => $department]);
    }

    public function update(UpdateDepartmentRequest $request , $id)
    {
        $data = $request->validated();
        $this->departmentRepository->update($data , $id);
        return redirect()->route('departments.index');
    }

    public function destroy($id)
    {
        $this->authorize('delete_department' , $id);
        $this->departmentRepository->destroy($id);
        return redirect()->route('departments.index');

    }
}
