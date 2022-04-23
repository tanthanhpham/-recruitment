<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="\admin\products" class="logo-link nk-sidebar-logo nk-menu-text">
                <img class="logo-light logo-img" src="{{asset('/logo.png')}}" srcset="./images/logo2x.png 3x" alt="logo">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dashboards</h6>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == '/' ? 'active current-page' : ''}}">
                        <a href="{{route('admin.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">User</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == '/certificate' ? 'active current-page' : ''}}">
                        <a href="{{route('certificate.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Certificate</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == '/field' ? 'active current-page' : ''}}">
                        <a href="{{route('field.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Field</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == '/language' ? 'active current-page' : ''}}">
                        <a href="{{route('language.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Language</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == '/position' ? 'active current-page' : ''}}">
                        <a href="{{route('position.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Position</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == '/salary' ? 'active current-page' : ''}}">
                        <a href="{{route('salary.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Salary</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
