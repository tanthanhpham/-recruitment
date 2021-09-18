
<header class="section-header">
	<section class="header-main border-bottom">
		<div class="container">
			<div class="row align-items-center">
        <div class="col-lg-1 col-2">
				</div>
				<div class="col-lg-1 col-2">
					<a href="http://bootstrap-ecommerce.com" class="brand-wrap">
						<img class="logo" src="{{asset('/logo-dark-1.png')}}" >
					</a> <!-- brand-wrap.// -->
				</div>
				<div class="col-lg-6 col-sm-12">
					<form action="#" class="search">
						<div class="input-group w-100">
							<input type="text" class="form-control" placeholder="Search">
							<div class="input-group-append">
							<button class="btn btn-primary" type="submit">
								<i class="fa fa-search"></i> Search
							</button>
							</div>
						</div>
					</form> <!-- search-wrap .end// -->
				</div> <!-- col.// -->
				<div class="col-lg-4 col-sm-6 col-12">
					<div class="widgets-wrap float-md-right">
						<div class="widget-header  mr-3">
							<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
							<span class="badge badge-pill badge-danger notify">0</span>
						</div>
					</div> <!-- widgets-wrap.// -->
				</div> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- container.// -->
	</section> <!-- header-main .// -->
</header> <!-- section-header.// -->

<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link" href="/">Home</a>
          </li>
        @foreach($categories as $i => $cate)
          @if($i<=4)
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{route('guest.getCategory',['id' => $cate->id] )}}">{{$cate->name}}</a>
            </li>
          @endif
        @endforeach
		@if($categories->count() > 4)
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> Thêm</a>
			<div class="dropdown-menu">
				@foreach($categories as $i => $cate)
					@if($i>4)
						<a class="nav-link" href="{{route('guest.getCategory',['id' => $cate->id] )}}">{{$cate->name}}</a>
					@endif
				@endforeach
			</div>
			</li>
		@endif
      </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
