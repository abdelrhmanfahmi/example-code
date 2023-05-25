<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepository , private DepartmentRepository $departmentRepository)
    {

    }

    public function searchEmployee(Request $request)
    {
        $employees = $this->employeeRepository->get([], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        if($request->first_name){
            $employees = $this->employeeRepository->get(['first_name' => $request->first_name], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        }
        return view('users.index' , ['employees' => $employees]);
    }

    public function index(Request $request) //search with first_name and last name change search from false to variable $name in the function
    {
        $employees = $this->employeeRepository->get([], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        // return EmployeeResource::collection($employees);
        return view('users.index' , ['employees' => $employees]);
    }

    public function create()
    {
        $departments = $this->departmentRepository->get([], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        $managers = $this->employeeRepository->getManagers([], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        return view('users.create' , ['departments' => $departments , 'managers' => $managers]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();
        $data['image'] = storeImage($data['image']);
        $this->employeeRepository->store($data)->assignRole('employee');
        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $employee = $this->employeeRepository->find($id);
        $departments = $this->departmentRepository->get([], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        $managers = $this->employeeRepository->getManagers([], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        return view('users.edit' , ['employee' => $employee ,'departments' => $departments , 'managers' => $managers]);
    }

    public function update(UpdateEmployeeRequest $request , $id)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $data['image'] = storeImage($data['image']);
        }
        $this->employeeRepository->update($data , $id);
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        try{
            $employee = $this->employeeRepository->find($id);
            \Storage::delete('images/' . $employee->image);
        }
        catch(\Exception $e){
            //do nothing
        }
        $this->employeeRepository->destroy($id);
        return redirect()->route('employees.index');
    }
}
