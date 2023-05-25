@extends('app.index')
@section('main')

    <div class="employees">
        <form action="{{ route('employees.update' , $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="col mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}">
                @if($errors->has('first_name'))
                    <div class="text-danger errorFirstName">{{ $errors->first('first_name') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}">
                @if($errors->has('last_name'))
                    <div class="text-danger errorLastName">{{ $errors->first('last_name') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $employee->email }}">
                @if($errors->has('email'))
                    <div class="text-danger errorEmail">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <div class="text-danger errorPassword">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Salary</label>
                <input type="text" name="salary" class="form-control" value="{{ $employee->salary }}">
                @if($errors->has('salary'))
                    <div class="text-danger errorSalary">{{ $errors->first('salary') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Image</label>
                <input type="file" name="image" accept="image/*" class="form-control">
                <img src= "{{Storage::get('app/images/', $employee->image) }}" alt="">
                @if($errors->has('image'))
                    <div class="text-danger errorImage">{{ $errors->first('image') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Departments</label>
                <select name="department_id" id="department_id" class="form-control">
                    <option disabled selected>-- choose department --</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_id'))
                    <div class="text-danger errorDepartmentId">{{ $errors->first('department_id') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Managers</label>
                <select name="manager_id" id="manager_id" class="form-control">
                    <option disabled selected>-- choose manager --</option>
                    @foreach ($managers as $manager)
                        <option value="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('manager_id'))
                    <div class="text-danger errorManagerId">{{ $errors->first('manager_id') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <button type="submit" class="btn btn-success">Update User</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            if ($(".errorFirstName")){
                setTimeout(() => {
                    $('.errorFirstName').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorLastName")){
                setTimeout(() => {
                    $('.errorLastName').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorEmail")){
                setTimeout(() => {
                    $('.errorEmail').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorPassword")){
                setTimeout(() => {
                    $('.errorPassword').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorPasswordConfirmation")){
                setTimeout(() => {
                    $('.errorPasswordConfirmation').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorSalary")){
                setTimeout(() => {
                    $('.errorSalary').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorImage")){
                setTimeout(() => {
                    $('.errorImage').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorDepartmentId")){
                setTimeout(() => {
                    $('.errorDepartmentId').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorManagerId")){
                setTimeout(() => {
                    $('.errorManagerId').fadeOut('slow');
                }, 4000);
            }
        });
    </script>

@endsection
