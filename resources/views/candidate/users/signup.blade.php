@extends('candidate.layout')

@section('main')
    <section class="section" >
        <div class="text-center">
            <h3>Enter your information</h3>
        </div>
        <div class="container">
            <!-- Start Animations Text -->
            <div class="bd-example">
                <form action="{{ route('candidate.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" style="text-align: left">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" style="text-align: left">Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter your address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class=" text-center">
                        <button type="submit" class="btn btn-common btn-large">Submit</button>
                    </div>
                </form>
            </div>
            <br>
            <!-- End Animations Text -->
        </div>
    </section>

@endsection
