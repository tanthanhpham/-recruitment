<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>

            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <a class="nk-news-item" href="#">
                    </a>
                </div>
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">Employer</div>
                                    <div class="user-name dropdown-indicator">{{$employer->name}}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>
                                         @php
                                             $arrName = explode(" ", $employer->name);
                                             $lastName = array_pop($arrName);
                                             $firstLetter=substr($lastName,0,1);
                                         @endphp
                                            {{$firstLetter}}
                                        </span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{$employer->name}}</span>
                                        <span class="sub-text">{{$employer->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('employer.show', ['id' => $employer->id]) }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="{{ route('employer.changePassword', ['id' => $employer->id]) }}"><em class="icon ni ni-setting-alt"></em><span>Change Password</span></a></li>
                                    <li><a href="{{ route('employer.edit', ['id' => $employer->id]) }}"><em class="icon ni ni-edit-alt"></em><span>Edit profile</span></a></li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('employer.logout') }}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->

                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
