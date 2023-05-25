@extends('app.index')
@section('main')

    <div class="users">
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('search.employee') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-start">
                        <input type="text" class="form-control w-50" name="first_name" placeholder="Search By Name">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Salary</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @if(count($employees) > 0)
                    @foreach ($employees as $index => $employee)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td class="d-flex">
                                <a href="/employees/{{$employee->id}}/edit" class="btn btn-success">Edit</a>
                                &nbsp;
                                <form method="POST" action="/employees/{{$employee->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <div class="">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center"><td colspan="5">No Data Yet</td></tr>
                @endif
            </tbody>
        </table>
    </div>


@endsection
