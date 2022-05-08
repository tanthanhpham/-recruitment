<div class="header">
    <!-- Start intro section -->
    <section id="intro" class="section-intro">
        <div class="logo-menu">
            <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand logo"><img src="{{asset('jobboard/assets/img/logo.png')}}" alt=""></a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand logo" href="index.html"><img src="assets/img/logo.png" alt=""></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar" style="padding: 0">
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav">
                            <li>
                                <a class = "{{request()->segment(0) == ' ' ? 'active' : ''}}" href="/">
                                    Home
                                </a>
                            </li>
                            <li class="drop">
                                <a href="#about">
                                    About us <i class=""></i>
                                </a>
                            </li>
                            <li class="drop">
                                <a href="#post">
                                    Post <i class=""></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right float-right">
                            @if(!$user == NULL)
                                <li class="right"><a href="{{route('candidate.logout')}}"><i class="ti-unlock"></i>  Log Out</a></li>
                                <li class="right">
                                <a>
                                    Your account <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown navbar-right" style="background: #FF4F57; color: white">
                                    <li>
                                        <a href="{{route('candidate.show', ['id' => $user->id ?? $user->id ])}}">
                                            Your information
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            List jobs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Wish list
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @else
                                <li class="right"><a href="{{route('candidate.signin')}}"><i class="ti-lock"></i>  Log In</a></li>
                                <li class="right"><a href="{{route('candidate.signup')}}"><i class="ti-unlock"></i>  Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Header Section End -->

        <div class="search-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
{{--                        <h1>Find the job that fits your life</h1><br><h2>More than <strong>{{$jobs->count()}}</strong> jobs are waiting to Kickstart your career!</h2>--}}
                        <div class="content">
                            <form method="post" action="{{route('home.search')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="keyword" placeholder="job title / keywords ">
                                            <i class="ti-time"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="place" placeholder="city / province">
                                            <i class="ti-location-pin"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="search-category-container">
                                            <label class="styled-select">
                                                <select class="dropdown-product selectpicker" name="field">
                                                    <option value="">All Categories</option>
                                                    @foreach($fields as $field)
                                                        <option value="{{$field->id}}">{{$field->name}}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-6">
                                        <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="popular-jobs">
                            <b>Popular Keywords: </b>
                            <a href="{{route('home.searchByKey')}}?field=web design">Web Design</a>
                            <a href="{{route('home.searchByKey')}}?field=manager">Manager</a>
                            <a href="{{route('home.searchByKey')}}?field=programming">Programming</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end intro section -->
</div>
