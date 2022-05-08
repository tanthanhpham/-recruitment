@extends('candidate.layout')

@section('main')
    <section class="section" >
        <div class="text-center">
            <h3>Enter your account</h3>
        </div>
        <div class="container">
            <!-- Start Animations Text -->
            <div class="bd-example">
                <form action="{{ route('candidate.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email" style="text-align: left">Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
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
