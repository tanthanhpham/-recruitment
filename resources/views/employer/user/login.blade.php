<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('authtemplate/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('authtemplate/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('authtemplate/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('authtemplate/css/style.css')}}">

    <title>Login</title>
</head>
<body>



<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="{{asset('authtemplate/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Sign In to <strong>JobBoard</strong></h3>
                            <p class="mb-4">Please update</p>
                        </div>
                        <form action="{{route('employer.login')}}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>

                            <input type="submit" value="Sign up" class="btn text-white btn-block btn-primary">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="{{asset('authtemplate/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('authtemplate/js/popper.min.js')}}"></script>
<script src="{{asset('authtemplate/js/bootstrap.min.js')}}"></script>
<script src="{{asset('authtemplate/js/main.js')}}"></script>
</body>
</html>
