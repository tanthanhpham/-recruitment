@extends('admin.users.layout', [
    'title' => ( $title ?? 'Create Account' )
])

@section('content')
<form action="/admin/store" method="POST">
    @csrf
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="#" class="form-validate" novalidate="novalidate">
                <div class="row g-gs">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Full Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email address</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-mail"></em>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" required="">
                                <span id="error_email"></span>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="phone">+84</span>
                                    </div>
                                    <input type="text" class="form-control" id="phonenumber" name="phone" required="">
                                </div>
                                <span id="error_phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="gender">Sex / Gender</label>
                            <div class="form-control-wrap">
                                <ul class="custom-control-group">
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="gender" id="sex-male" required="">
                                            <label class="custom-control-label" for="sex-male">Male</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="gender" id="sex-female" required="">
                                            <label class="custom-control-label" for="sex-female">Female</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input" name="gender" id="sex-other" required="">
                                            <label class="custom-control-label" for="sex-other">Others</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="new_password">Password</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="new_password" id="new_password"required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="new_password_confirmation">Re-enter password</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation"required="">
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" id="register" class="btn btn-lg btn-primary">Save Informations</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</form>
@endsection

@push('footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>

    $(document).ready(function(){
        $('#email').change(function(){
            var error_email = '';
            var email = $('#email').val();
            var _token = $('input[name="_token"]').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!filter.test(email)){    
                $('#email').addClass('has-error');
                $('#error_email').html('<label class="text-danger">Invalid email</label>');
                $('#register').attr('disabled', 'disabled');
            }else{
                $.ajax({
                    url:"{{ route('admin.checkEmail') }}",
                    method: "POST",
                    data: {email:email, _token:_token},
                    success:function(result){
                        if(result=="exist"){
                            $('#email').addClass('has-error');
                            $('#error_email').html('<label class="text-danger">Email already exists</label>');
                            $('#register').attr('disabled', 'disabled');
                        }else{
                            $('#error_email').html('<label class="text-success">Email available</label>');
                            $('#email').removeClass('has-error');
                            $('#register').attr('disabled', false);
                        }
                    }
                })
               
            }
        });
    });
    $(document).ready(function(){
        $('#phonenumber').change(function(){
            var phone = $('#phonenumber').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url:"{{ route('admin.checkPhone') }}",
                    method: "POST",
                    data: {phone:phone, _token:_token},
                    success:function(result){
                        console.log(result);
                        if(result=="exist"){
                            $('#phonenumber').addClass('has-error');
                            $('#error_phone').html('<label class="text-danger">Phone number already exists</label>');
                            $('#register').attr('disabled', 'disabled');
                        }else{
                            $('#error_phone').html('<label class="text-success">Phone number available</label>');
                            $('#phonenumber').removeClass('has-error');
                            $('#register').attr('disabled', false);
                        }
                    }
                })
        });
    });
    
</script>

@enpush
