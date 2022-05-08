@extends('admin.layout', [
    'title' => ( $title ?? 'Certificate Management' )
])

@section('main')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body"><div class="nk-block-head nk-block-head-sm">
                        <ul class="breadcrumb breadcrumb-arrow">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ul>
                    </div><!-- .breadcrumb -->
                    <div class="nk-block-head ">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">{{$title}}</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
{{--                                        <ul class="nk-block-tools g-3">--}}
{{--                                            <li class="nk-block-tools-opt"><a href="{{route('admin.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Create Account</span></a></li>--}}
{{--                                        </ul>--}}
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @yield('content')
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

@endsection
