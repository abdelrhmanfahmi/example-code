@extends('app.index')
@section('main')

    <div class="myTasks">
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('search.myTasks') }}" method="POST">
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
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @if(count($tasks) > 0)
                    @foreach ($tasks as $index => $task)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->status }}</td>
                            <td class="d-flex">
                                <a href="/update/status/tasks/{{$task->id}}" class="btn btn-success">Update Status</a>
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
