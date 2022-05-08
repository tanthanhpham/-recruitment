@extends('employer.user.layout')

@section('content')
    <form action="{{ route('employer.update', ['id' => $employer->id]) }}" method="POST">
        @csrf
        <div class="card card-bordered">
            <div class="card-inner">
                <h4>Your information</h4>
                <hr>
                <form action="#" class="form-validate" novalidate="novalidate">
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Full Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" required="" value="{{ $employer->name }}">
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
                                    <input type="text" class="form-control" id="email" name="email" required=""  value="{{ $employer->email }}">
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
                                        <input type="text" class="form-control" id="phonenumber" name="phone" required=""  value="{{ $employer->phone }}">
                                    </div>
                                    <span id="error_phone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="company">Company</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="company" id="company" required="" value="{{ $employer->company }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="address">Address</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="address" id="address" required="" value="{{ $employer->address }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-primary">Save Information</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
@endsection
