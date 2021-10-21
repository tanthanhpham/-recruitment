@extends('admin.users.layout', [
    'title' => ( $title ?? 'Account Management' )
])

@section('content')
<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="card-inner-group">
            <div class="card-inner position-relative card-tools-toggle">
                <div class="card-title-group">
                </div><!-- .card-title-group -->
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
                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Last updated</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                        <div class="nk-tb-col nk-tb-col-tools text-right">
                        </div>
                    </div><!-- .nk-tb-item -->
                    @foreach($userlist as $i => $userli)
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid{{$i}}">
                                <label class="custom-control-label" for="uid{{$i}}"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <a href="html/user-details-regular.html">
                                <div class="user-card">
                                    <div class="user-avatar bg-primary">
                                        <span>
                                            @php 
                                                $arrName = explode(" ", $userli->name);
                                                $lastName = array_pop($arrName); 
                                                $firstLetter=substr($lastName,0,1);
                                            @endphp
                                            {{$firstLetter}}
                                        </span>
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{$userli->name}} <span class="dot dot-success d-md-none ml-1"></span></span>
                                        <span>{{$userli->email}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span>{{$userli->phone}}</span>
                        </div>
                        <div class="nk-tb-col tb-col-lg">
                            <span>{{$userli->updated_at}}</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                        @if($userli->is_active == 1)
                            <span class="tb-status text-success">
                                Active
                            </span>
                        @else
                            <span class="tb-status text-danger">
                                Locked
                            </span>
                        @endif
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{URL::to('admin/show/'.$userli->id)}}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                <li><a href="{{URL::to('admin/lock/'.$userli->id)}}"><em class="icon ni ni-shield-off"></em><span>Lock/Unlock</span></a></li>
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
                            {!!$userlist->links('pagination::bootstrap-4')!!}
                    </div>
                </div><!-- .nk-block-between -->
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
    </div>
@endsection