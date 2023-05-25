@extends('app.index')
@section('main')

    <div class="tasks">
        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col mb-3">
                <label>Task Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="text-danger errorName">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <label>Task Status</label>
                <select name="status" id="status" class="form-control">
                    <option disabled selected>-- choose status --</option>
                    <option value="pending">pending</option>
                    <option value="passed">passed</option>
                    <option value="failed">failed</option>
                </select>
                @if($errors->has('status'))
                    <div class="text-danger errorStatus">{{ $errors->first('status') }}</div>
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
            if ($(".errorName")){
                setTimeout(() => {
                    $('.errorName').fadeOut('slow');
                }, 4000);
            }
            if ($(".errorStatus")){
                setTimeout(() => {
                    $('.errorStatus').fadeOut('slow');
                }, 4000);
            }
        });
    </script>

@endsection
