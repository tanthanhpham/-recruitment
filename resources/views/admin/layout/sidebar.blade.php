<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="\admin" class="logo-link nk-sidebar-logo nk-menu-text">
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
                    <li class="nk-menu-item {{request()->segment(2) == 'product_categories' ? 'active current-page' : ''}}">
                        <a href="{{route('product_category.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
                            <span class="nk-menu-text">Category</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == 'brands' ? 'active current-page' : ''}}">
                        <a href="{{route('brand.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                            <span class="nk-menu-text">Brand</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item {{request()->segment(2) == 'products' ? 'active current-page' : ''}}">
                        <a href="{{route('product.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                            <span class="nk-menu-text">Product</span>
                        </a>
                    </li><!-- .nk-menu-item  -->
                    <li class="nk-menu-item {{request()->segment(2) == 'transactions' ? 'active current-page' : ''}}">
                        <a href="{{route('transaction.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                            <span class="nk-menu-text">Transaction</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
                
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>