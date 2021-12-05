@extends('guest.layout')

@section('main')
  <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('storage/'.$product->image)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->name}}</h4>
                            @foreach($product->size as $i => $size)
                                @if($i==0)
                                    <h3 id="price"> 
                                        <?php echo number_format($size->product_price->price,0)."đ"; ?>
                                    </h3>
                                    <input type="hidden" id="getPrice" value="{{$size->product_price->price}}">
                                    <input type="hidden" id="getIdPrice" value="{{$size->product_price->id}}">
                                @endif
                                
                            @endforeach
                            <div style="text-align: left;">{!!$product->discription!!}</div>
                            
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    @foreach($product->size as $i => $size)
                                        <label @if($i==0) class="avtive" @endif for="size{{$size->name}}">
                                            <input type="radio" name="size" @if($i==0) checked="" @endif value ="{{$size->name}}" id="size{{$size->name}}" class="custom-control-input">
                                            <input type="hidden" id="pro_id" value="{{$product->id}}">
                                            <div>{{$size->name}}</div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            {{csrf_field()}}
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" id="quantity" value="1">
                                    </div>
                                </div>
                                <a href="#" class="primary-btn addToCart">Thêm vào giỏ hàng</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span></span></h5>
                                <ul>
                                    <li><span>Loại sản phẩm: </span>
                                        @foreach($categories as $cate)
                                            @if($cate->id == $product->category_id)
                                                {{$cate->name}}
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><span>Thương hiệu: </span>
                                        @foreach($brands as $brand)
                                            @if($brand->id == $product->brand_id)
                                                {{$brand->name}}
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Thành phần</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Hướng dẫn</a>
                                </li>
                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <p>{!!$product->ingredient!!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <p>{!!$product->direction!!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

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
					$('#getPrice').attr('value',result);
				}
			});
		});
	});
</script>

<script>
	$(document).ready(function(){
		$('input[name=size]').change(function(){
			var size=$('input[name=size]:checked').val();
			var pro_id=$('#pro_id').val();
			var _token=$('input[name=_token]').val();
			$.ajax({
				url: "{{ route('guest.getIdPrice') }}",
				type:"POST",
				data:  {_token:_token, size:size, id:pro_id },
				success: function(result){
					$('#getIdPrice').attr('value',result);
				}
			});
		});
	});
</script>

<script>
	$(document).ready(function(){
		$('.addToCart').click(function(){
			var pro_id=$('#pro_id').val();
			var id =$('#getIdPrice').val();
			var size=$('input[name=size]:checked').val();
			var price=$('#getPrice').val();
            var number=$('#quantity').val();
			$.ajax({
				url: "/addCart/" +pro_id,
				type:"GET",
				data:  { size:size, price:price, id:id,number:number},
				success: function(result){
					alertify.notify('Thêm sản phẩm thành công','primary');
					$('#cart').html(result);
				}
			});
		});
	});
</script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

@endpush
