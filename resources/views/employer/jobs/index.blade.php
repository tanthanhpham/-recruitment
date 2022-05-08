@extends('employer.jobs.layout')

@section('content')
    @if($jobs->count() == 0)
        <div class="card-inner p-0">
            <div class="alert m-0">
                <div class="alert alert-warning alert-icon">
                    <em class="icon ni ni-alert-circle"></em> Bạn chưa thêm thông tin tuyển dụng nào. Thêm thông tin tuyển dụng<a href="{{route('job.create')}}"> tại đây</a>.
                </div>
            </div>
        </div>
    @else
        <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Jobs</h3>
                    <div class="nk-block-des text-soft">
                        <p>You have total {{$jobs->count()}} jobs.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt"><a href="{{route('job.create')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add new job</span></a></li>
                            </ul>
                        </div>
                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    @foreach($jobs as $job)
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="project">
                                    <div class="project-head">
                                        <a href="html/apps-kanban.html" class="project-title">
                                            <div style="width: 100px;"><span style="padding-right: 10px">
                                                    <img src="http://127.0.0.1/uploads/{{$job->path}}">
                                                </span></div>
                                            <div class="project-info" style="padding-left: 10px;">
                                                <h6 class="title">{{$job->name}}</h6>
                                                <span class="sub-text">{{$job->position}}</span>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{route('job.show', ['id' => $job->id])}}"><em class="icon ni ni-eye"></em><span>View job</span></a></li>
                                                    <li><a href="{{route('job.edit', ['id' => $job->id])}}"><em class="icon ni ni-edit"></em><span>Edit job</span></a></li>
{{--                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-details">
                                        <p>{{$job->brief}}</p>
                                    </div>
                                    <div class="project-progress">
                                        <div class="project-progress-details">
                                            <div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>3 CV</span></div>
                                        </div>
                                        <div class="progress progress-pill progress-md bg-light">
                                        </div>
                                    </div>
                                    <div class="project-meta">
                                        <ul class="project-users g-1">
                                        </ul>
                                        <span class="badge badge-dim badge-warning"><em class="icon ni ni-clock"></em><span>End at {{$job->end_date}}</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-2">
                    {{$jobs->links('pagination::bootstrap-4')}}
                </div>
        </div><!-- .nk-block -->
    </div>
    @endif
@endsection
