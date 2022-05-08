@extends('employer.user.layout')

@section('content')
    <form action="{{ route('employer.handleChangePassword') }}" method="POST">
        @csrf
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="#" class="form-validate" novalidate="novalidate">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="password">Old Password</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password"required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="newpassword">New password</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="newpassword" id="newpassword"required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="confirm_password">Re-enter password</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-primary">Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
@endsection
