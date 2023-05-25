<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <div class="text-danger errorEmail">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                    <div class="text-danger errorPassword">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </form>
                    </div>
                  </div>
                    @if($errors->has('msg'))
                        <div class="text-danger errorMessage">{{ $errors->first('msg') }}</div>
                    @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
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
            if($(".errorMessage")){
                setTimeout(() => {
                    $('.errorMessage').hide('slow');
                } , 4000);
            }
        });
    </script>
</body>
</html>
