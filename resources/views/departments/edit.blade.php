@extends('app.index')
@section('main')

    <div class="department">
        <form action="{{ route('departments.update' , $department->id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="col mb-3">
                <label>Department Name</label>
                <input type="text" name="name" class="form-control" value="{{ $department->name }}">
                @if($errors->has('name'))
                    <div class="text-danger errorName">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="col mb-3">
                <button type="submit" class="btn btn-success">Update Department</button>
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
        });
    </script>

@endsection
