@extends('employer.jobs.layout')

@section('content')
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-aside-wrap">
                <div class="card-content">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><em class="icon ni ni-file-text"></em><span>General Information</span></a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="card-inner"abu>
                        <div class="nk-block">
                            <div class="nk-block-head">
                                <h5 class="title">{{$job->name}}</h5>
                                <p>{{$job->brief}}</p>
                            </div><!-- .nk-block-head -->
                            <div class="profile-ud-list">
                                <div class="profile-ud-item">
                                    <div class="profile-ud wider">
                                        <span class="profile-ud-label">Gender</span>
                                        <span class="profile-ud-value">{{$job->gender}}</span>
                                    </div>
                                </div>
                                <div class="profile-ud-item">
                                    <div class="profile-ud wider">
                                        <span class="profile-ud-label">Number</span>
                                        <span class="profile-ud-value">{{$job->number}}</span>
                                    </div>
                                </div>
                                <div class="profile-ud-item">
                                    <div class="profile-ud wider">
                                        <span class="profile-ud-label">Place</span>
                                        <span class="profile-ud-value">{{$job->position}}</span>
                                    </div>
                                </div>
                                <div class="profile-ud-item">
                                    <div class="profile-ud wider">
                                        <span class="profile-ud-label">Certificate</span>
                                        <span class="profile-ud-value">{{$job->certificate_id}}</span>
                                    </div>
                                </div>
                                <div class="profile-ud-item">
                                    <div class="profile-ud wider">
                                        <span class="profile-ud-label">Field</span>
                                        <span class="profile-ud-value">{{$job->field_id}}</span>
                                    </div>
                                </div>
                                <div class="profile-ud-item">
                                    <div class="profile-ud wider">
                                        <span class="profile-ud-label">Salary</span>
                                        <span class="profile-ud-value">{{$job->salary_id}}</span>
                                    </div>
                                </div>
                            </div><!-- .profile-ud-list -->
                        </div><!-- .nk-block -->
                        <div class="nk-block">
                            <div class="nk-block-head nk-block-head-line">
                                <h6 class="title overline-title text-base">Additional Information</h6>
                            </div><!-- .nk-block-head -->
                        </div><!-- .nk-block -->
                        <div class="nk-divider divider md"></div>
                        <div class="nk-block">
                            <div>
                                <label class="form-label">Description</label>
                                <div>
                                    {!! $job->description !!}
                                </div>
                            </div><!-- .bq-note-item -->
                            <div class="bq-note">
                                <div>
                                    <label class="form-label">Benefit</label>
                                    <div>
                                        <p>{!! $job->benefit !!}</p>
                                    </div>
                                </div><!-- .bq-note-item -->
                            </div><!-- .bq-note -->
                        </div><!-- .nk-block -->
                    </div><!-- .card-inner -->
                </div><!-- .card-content -->
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div>
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><em class="icon ni ni-table-view"></em><span>Candidate list</span></a>
                    </li>
                </ul>
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="card-tools">
                        </div><!-- .card-tools -->
                        <div class="card-tools mr-n1">
                            <ul class="btn-toolbar gx-1">
                                <li>
                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                </li><!-- li -->
                                <li class="btn-toolbar-sep"></li><!-- li -->
                                <li>
                                    <div class="toggle-wrap">
                                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                        <div class="toggle-content" data-content="cardTools">
                                            <ul class="btn-toolbar gx-1">
                                                <li class="toggle-close">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                </li><!-- li -->
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                            <em class="icon ni ni-setting"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                            <ul class="link-check">
                                                                <li><span>Show</span></li>
                                                                <li class="active"><a href="#">10</a></li>
                                                                <li><a href="#">20</a></li>
                                                                <li><a href="#">50</a></li>
                                                            </ul>
                                                            <ul class="link-check">
                                                                <li><span>Order</span></li>
                                                                <li class="active"><a href="#">DESC</a></li>
                                                                <li><a href="#">ASC</a></li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                            </ul><!-- .btn-toolbar -->
                                        </div><!-- .toggle-content -->
                                    </div><!-- .toggle-wrap -->
                                </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                        </div><!-- .card-tools -->
                    </div><!-- .card-title-group -->
                    <div class="card-search search-wrap" data-search="search">
                        <div class="card-body">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div>
                    </div><!-- .card-search -->
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid">
                                    <label class="custom-control-label" for="uid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col"><span class="sub-text">User</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Address</span></div>
                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">Apply date</span></div>
                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                            <div class="nk-tb-col nk-tb-col-tools text-right">
                                <div class="dropdown">
                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                        <ul class="link-tidy sm no-bdr">
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox checked">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="bl">
                                                    <label class="custom-control-label" for="bl">Balance</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox checked">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="ph">
                                                    <label class="custom-control-label" for="ph">Phone</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="vri">
                                                    <label class="custom-control-label" for="vri">Verified</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="st">
                                                    <label class="custom-control-label" for="st">Status</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-tb-item -->
                        @foreach($employees as $employee)
                            <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                    <label class="custom-control-label" for="uid1"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col">
                                <a href="html/user-details-regular.html">
                                    <div class="user-card">
                                        <div class="user-avatar bg-primary">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">{{$employee->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                            <span>{{$employee->email}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{$employee->address}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span>{{$employee->phone}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-lg">
                                @foreach($recruitments as $recruitment)
                                    @if($recruitment->job_id==$job->id)
                                        <span>{{$recruitment->created_at}}</span>
                                    @endif
                                @endforeach
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                @foreach($recruitments as $recruitment)
                                    @if($recruitment->job_id==$job->id)
                                        @if($recruitment->status == 0)
                                            <span class="tb-status text-warning ml-3">{{$recruitment->status}}</span>
                                        @elseif($recruitment->status == 1)
                                            <span class="tb-status text-success">{{$recruitment->status}}</span>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li class="nk-tb-action-hidden">
                                        <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send Email">
                                            <em class="icon ni ni-mail-fill"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-emails"></em><span>Send email</span></a></li>
                                                    @foreach($recruitments as $recruitment)
                                                        @if($recruitment->job_id==$job->id)
                                                            <li><a href="{{'http://127.0.0.1/'. $recruitment->path}}"><em class="icon ni ni-download"></em><span>Download CV</span></a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->
                        @endforeach
                    </div><!-- .nk-tb-list -->
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="nk-block-between-md g-3">
                        <div class="g">
                            <ul class="pagination justify-content-center justify-content-md-start">

                            </ul><!-- .pagination -->
                        </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div>
@endsection
