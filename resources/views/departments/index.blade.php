@extends('app.index')
@section('main')

    <div class="department">
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('search.departments') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-start">
                        <input type="text" class="form-control w-50" name="name" placeholder="Search By Name">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @if(count($departments) > 0)
                    @foreach ($departments as $index => $department)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $department->name }}</td>
                            <td class="d-flex">
                                <a href="/departments/{{$department->id}}/edit" class="btn btn-success">Edit</a>
                                &nbsp;
                                <form method="POST" action="/departments/{{$department->id}}">
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
                    <tr class="text-center"><td colspan="4">No Data Yet</td></tr>
                @endif
            </tbody>
        </table>
    </div>


@endsection
