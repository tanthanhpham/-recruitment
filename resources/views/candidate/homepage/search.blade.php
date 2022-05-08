@extends('candidate.layout')

@section('main')

<!-- Find Job Section Start -->
<section class="find-job section">
    <div class="container">
        <div class="row">
            @if($jobs->count() == 0)
                <div class="text-center" style="font-size: 30px">
                    <span class="text-danger">No job is suit with your requirement</span>
                </div>
            @else
            <div class="col-md-12">
                @foreach($jobs as $job)
                <div class="job-list col-md-12">
                    <div class="thumb">
                        <a href="job-details.html"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
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
            </div>
            @endif
        </div>
    </div>
</section>
<!-- Find Job Section End -->
@endsection
