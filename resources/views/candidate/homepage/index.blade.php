@extends('candidate.layout')

@section('main')
    <!-- Find Job Section Start -->
<section class="find-job section">
    <div class="container">
        <h2 class="section-title" id="scroll">Hot Jobs</h2>
        <div class="row">
            <div class="col-md-12">
                @foreach($hotJobs as $job)
                <div class="job-list col-md-12">
                    <div class="thumb">
                        <a href="job-details.html"><img style="width: 100px" src="http://127.0.0.1/uploads/{{$job->path}}" alt=""></a>
                    </div>
                    <div class="job-list-content">
                        <h4><a href="{{route('home.job.show', ['id' => $job->id])}}">{{$job->name}}</a>
                            @if($job->shift == 'Full time')
                                <span class="full-time">{{$job->shift}}</span>
                            @else
                                <span class="part-time">{{$job->shift}}</span>
                            @endif
                        </h4>
                        <p>{{$job->brief}}</p>
                        <div class="job-tag">
                            <div class="pull-left">
                                <div class="meta-tag">
                                    @foreach($fields as $field)
                                        @if($field->id == $job->field_id)
                                            <span><a href=""><i class="ti-brush"></i>{{$field->name}}</a></span>
                                        @endif
                                    @endforeach
                                    <span><i class="ti-location-pin"></i>{{$job->position}}</span>
{{--                                    <span><i class="ti-time"></i>60/Hour</span>--}}
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="icon">
                                    <i class="ti-heart"></i>
                                </div>
                                <a href="{{route('home.job.show', ['id' => $job->id])}}" class="btn btn-common btn-rm">More Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="showing pull-left">
                </div>
                <ul class="pagination pull-right">
                    {{$jobs->links('pagination::bootstrap-4')}}

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Find Job Section End -->

<!-- Featured Jobs Section Start -->
<section class="featured-jobs section">
    <div class="container">
        <h2 class="section-title">
            Featured Jobs
        </h2>
        <div class="row">
            @foreach($jobs as $job)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <figure class="item-thumb">
                                    <a class="hover-effect" href="{{route('home.job.show', ['id' => $job->id])}}">
                                        <img style="width: 80px;" src="http://127.0.0.1/uploads/{{$job->path}}"alt="">
                                    </a>
                                </figure>
                                <div class="item-body">
                                    <h3 class="job-title"><a href="{{route('home.job.show', ['id' => $job->id])}}">{{$job->name}}</a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> {{$job->position}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> {{$job->end_date}}</span>
                            <div class="view-iocn">
                                <a href="{{route('home.job.show', ['id' => $job->id])}}"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Jobs Section End -->

<!-- Start Purchase Section -->
<section class="section purchase" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="section-content text-center">
                <h1 class="title-text">
                    Looking for a Job
                </h1>
                <p>Join thousand of employers and earn what you deserve!</p>
                <a class="btn btn-common" href="#scroll">Get Started Now</a>
            </div>
        </div>
    </div>
</section>
<!-- End Purchase Section -->

<!-- Testimonial Section Start -->
<section id="testimonial" class="section">
    <div class="container">
        <div class="row">
            <div class="touch-slider" class="owl-carousel owl-theme">
                <div class="item active text-center">
                    <img class="img-member" src="{{asset('jobboard/assets/img/testimonial/img1.jpg')}}" alt="">
                    <div class="client-info">
                        <h2 class="client-name">Jessica <span>(Senior Accountant)</span></h2>
                    </div>
                    <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
                </div>
                <div class="item text-center">
                    <img class="img-member" src="{{asset('jobboard/assets/img/testimonial/img2.jpg')}}" alt="">
                    <div class="client-info">
                        <h2 class="client-name">John Doe <span>(Project Menager)</span></h2>
                    </div>
                    <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
                </div>
                <div class="item text-center">
                    <img class="img-member" src="{{asset('jobboard/assets/img/testimonial/img3.jpg')}}" alt="">
                    <div class="client-info">
                        <h2 class="client-name">Helen <span>(Engineer)</span></h2>
                    </div>
                    <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- Clients Section -->
<section class="clients section">
    <div class="text-center" style="font-size: 30px; font-weight: bold">
        Starting from today or never
    </div>
</section>
<!-- Client Section End -->


<!-- Counter Section Start -->
<section id="counter">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="counting">
                    <div class="icon">
                        <i class="ti-briefcase"></i>
                    </div>
                    <div class="desc">
                        <h2>Jobs</h2>
                        <h1 class="counter">{{$jobs->count()}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="counting">
                    <div class="icon">
                        <i class="ti-user"></i>
                    </div>
                    <div class="desc">
                        <h2>Members</h2>
                        <h1 class="counter">{{$accounts->count()}}</h1>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                <div class="counting">--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ti-write"></i>--}}
{{--                    </div>--}}
{{--                    <div class="desc">--}}
{{--                        <h2>Resume</h2>--}}
{{--                        <h1 class="counter">700</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="counting">
                    <div class="icon">
                        <i class="ti-heart"></i>
                    </div>
                    <div class="desc">
                        <h2>Company</h2>
                        <h1 class="counter">{{$companies->count()}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Section End -->
@endsection
