@extends('app.index')
@section('main')

    <div class="tasks">
        <form action="{{ route('assign.task') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col mb-3">
                <label>Tasks</label>
                <select name="task_id" id="task_id" class="form-control">
                    <option disabled selected>-- choose tasks --</option>
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('task_id'))
                    <div class="text-danger errorTaskId">{{ $errors->first('task_id') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Employees</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option disabled selected>-- choose employees --</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <div class="text-danger errorUserId">{{ $errors->first('user_id') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <button type="submit" class="btn btn-success">Add Task</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            if ($(".errorTaskId")){
                setTimeout(() => {
                    $('.errorTaskId').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorUserId")){
                setTimeout(() => {
                    $('.errorUserId').fadeOut('slow');
                }, 4000);
            }
        });
    </script>

@endsection
