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
					<form action="{{route('guest.search')}}" class="search" method="GET">
						<div class="input-group w-100">
							<input type="text" class="form-control" id="keyword" name="keyword" placeholder="Tìm kiểu theo tên, nhãn hiệu, loại sản phẩm,...">
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
							<span class="badge badge-pill badge-danger notify" id="cart">@if(Session::has('cart')!=null){{Session::get('cart')->totalQuanty}} @else 0 @endif</span>
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
		@php
			$count=0;
		@endphp
        @foreach($categories as $i => $cate)
			@if($cate->p_category_id==0)
				@php
					$count=$count+1;
				@endphp
			@endif
		
		@if($count < 6)
			@if($cate->p_category_id==0)
				<li class="nav-item dropdown">
					@php
						$flag = 0;
					@endphp
					@foreach($categories as $cate3)
						@if($cate3->p_category_id==$cate->id)
							@php
								$flag = 1
							@endphp
						@endif
					@endforeach
					@if($flag==1)
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{route('guest.getCategory',['id' => $cate->id] )}}">{{$cate->name}}</a>
					
					@else
						<a class="nav-link" href="{{route('guest.getCategory',['id' => $cate->id] )}}">{{$cate->name}}</a>
					@endif
					<div class="dropdown-menu">
						<a class="nav-link" href="{{route('guest.getCategory',['id' => $cate->id] )}}">{{$cate->name}}</a>
					@foreach($categories as $cate2)
						@if($cate2->p_category_id==$cate->id)
							<a class="nav-link" href="{{route('guest.getCategory',['id' => $cate2->id] )}}">{{$cate2->name}}</a>
						@endif
					@endforeach
					</div>
				</li>
			@endif
		@endif
        @endforeach

		@if($count >= 6)
		@php
			$check=0;
		@endphp
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> Thêm</a>
				<div class="dropdown-menu">
					@foreach($categories as $i => $cate)
						@if($cate->p_category_id==0)
							@php
								$check=$check+1;
							@endphp
						@endif
						@if($check>=6 && $cate->p_category_id==0)
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

