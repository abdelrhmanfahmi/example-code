<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepository)
    {

    }

    public function index(Request $request) //search with first_name and last name change search from false to variable $name in the function
    {
        $name = $request->name;
        $employees = $this->employeeRepository->get([], false , false , false , 15 , 'created_at' , 'asc' , false);
        return EmployeeResource::collection($employees);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();
        $data['image'] = storeImage($data['image']);
        $this->employeeRepository->store($data)->assignRole('employee');
        return response()->json(['message' => 'Employee Created Successfully']);
    }

    public function update(UpdateEmployeeRequest $request , $id)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $data['image'] = storeImage($data['image']);
        }
        $this->employeeRepository->update($data , $id);
        return response()->json(['message' => 'Employee Updated Successfully']);
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
        return response()->json(['message' => 'Employee Deleted Successfully']);
    }
}
