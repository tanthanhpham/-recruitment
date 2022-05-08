@extends('candidate.layout')

@section('main')
    <section class="section" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                   <table style="font-size: 16px">
                       <tr>
                           <td colspan="2" style="text-align: center;
                                                font-size: 20px;
                                                padding-bottom: 5px;
                                                font-weight: bold;">
                               Your information
                           </td>
                       </tr>
                       <tr>
                           <th style="width: 100px">
                               Name:
                           </th>
                           <td>
                               {{$user->name}}
                           </td>
                       </tr>
                       <tr>
                           <th>
                               Email:
                           </th>
                           <td>
                               {{$user->email}}
                           </td>
                       </tr>
                       <tr>
                           <th>
                               Phone:
                           </th>
                           <td>
                               {{$user->phone}}
                           </td>
                       </tr>
                       <tr>
                           <th>
                               Address:
                           </th>
                           <td>
                               {{$user->address}}
                           </td>
                       </tr>
                   </table>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <h4 style="font-size: 30px">Job list</h4>
                    </div>
                    @foreach($jobs as $job)
                    <div class="job-list col-lg-12">
                        <div class="thumb">
                            <a href="job-details.html"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
                        </div>
                        <div class="job-list-content" style="margin-left: 0px">
                            <h4><a href="{{route('home.job.show', ['id' => $job->id])}}">{{$job->name}}</a>
                                @if($job->shift == 'Full time')
                                    <span class="full-time">{{$job->shift}}</span>
                                @else
                                    <span class="part-time">{{$job->shift}}</span>
                                @endif
                            </h4>

                            <div class="job-tag">
                                <p style="display: inline">{{$job->brief}}</p>
                                <div class="pull-right" style="display: flex">
                                    <a href="{{route('home.job.show', ['id' => $job->id])}}" class="btn btn-common btn-rm">More Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
