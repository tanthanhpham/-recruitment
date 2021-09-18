@extends('guest.page.layout', [
    'title' => ( $title ?? 'Chi tiết sản phẩm' )
])

@section('content')
<div class="card">
	<div class="row no-gutters">
		<aside class="col-md-6">
			<article class="gallery-wrap"> 
				<div class="img-big-wrap">
				<a href="#"><img src="{{asset('storage/'.$product->image)}}"></a>
				</div> <!-- img-big-wrap.// -->
			</article> <!-- gallery-wrap .end// -->
		</aside>
		<main class="col-md-6 border-left">
			<article class="content-body">
				<h2 class="title">{{$product->name}}</h2>
				<div class="mb-3"> 
					@foreach($product->size as $i => $size)
						@if($i==0)
							<var class="price h4" id="price">{{$size->product_price->price}}</var> VNĐ
						@endif
						
					@endforeach
					
				</div> 

				<p>{{$product->discription}}</p>

				<dl class="row">
					<dt class="col-sm-3">Loại</dt>
					<dd class="col-sm-9">
						@foreach($categories as $cate)
							@if($cate->id==$product->category_id)
								{{$cate->name}}
							@endif
						@endforeach
					</dd>
					<dt class="col-sm-3">Nhãn hiệu</dt>
					<dd class="col-sm-9">
						@foreach($brands as $brand)
							@if($brand->id==$product->brand_id)
								{{$brand->name}}
							@endif
						@endforeach
					</dd>

				</dl>

				<hr>
				<div class="row">
					<div class="form-group col-md flex-grow-0">
						<label>Quantity</label>
						<div class="input-group mb-3 input-spinner">
						<div class="input-group-prepend">
							<button class="btn btn-light" type="button" id="button-plus"> + </button>
						</div>
						<input type="text" class="form-control" value="1">
						<div class="input-group-append">
							<button class="btn btn-light" type="button" id="button-minus"> − </button>
						</div>
						</div>
					</div> <!-- col.// -->
					<div class="form-group col-md">
						<label>Select size</label>
						<div class="mt-2">
							@foreach($product->size as $i => $size)
								<label class="custom-control custom-radio custom-control-inline">
									<input type="radio" name="size" @if($i==0) checked="" @endif value ="{{$size->name}}" class="custom-control-input">
									<input type="hidden" id="pro_id" value="{{$product->id}}">
									<div class="custom-control-label">{{$size->name}}</div>
								</label>
							@endforeach
							</label>
						</div>
					</div> <!-- col.// -->
				</div> <!-- row.// -->
				{{csrf_field()}}
				<a href="#" class="btn  btn-primary"> Buy now </a>
				<a href="#" class="btn  btn-outline-primary"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
			</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->
</div>
@endsection

@push('footer')
<script>
	$(document).ready(function(){
		$('input[name=size]').change(function(){
			var size=$('input[name=size]:checked').val();
			var pro_id=$('#pro_id').val();
			var _token=$('input[name=_token]').val();
			$.ajax({
				url: "{{ route('guest.getPrice') }}",
				type:"POST",
				data:  {_token:_token, size:size, id:pro_id },
				success: function(result){
					$('#price').html(result);
				}
			});

		});

	});

</script>
@endpush