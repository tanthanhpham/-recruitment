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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="phone">+84</span>
                                    </div>
                                    <input type="text" class="form-control" name="phone" required="">
                                </div>
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
                            <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email"id="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="new_password">Password</label>
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="new_password_confirmation">Re-enter password</label>
        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
@endsection
