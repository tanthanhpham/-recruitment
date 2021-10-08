@extends('guest.page.layout',[
    'title' => ($title ?? 'Chi tiết giỏ hàng')
])

@section('content')
<div class="card" id="cart-body">
    <div class="row no-gutters">
        <aside class="col-md-9">
        @if (Session::has('cart')!=null)
            @foreach(Session::get('cart')->products as $product)
                <article class="card-body border-bottom">
                    <div class="row">
                        <div class="col-md-6">
                            <figure class="itemside">
                                <div class="aside"><img src="{{asset('storage/'.$product['product']->image)}}" class="border img-sm"></div>
                                <figcaption class="info">
                                    <a href="#" class="title">{{$product['product']->name}}</a>
                                    <strong class="" id="priceshow{{$product['id_price']}}">{{$product['price']}}</strong>
                                    <input type="hidden" id="price{{$product['id_price']}}" value="{{$product['price']}}">
                                    <input type="hidden" class="idPrice" value=" {{$product['id_price'] }} ">
                                    <div>
                                        <button class="btn btn-danger" onclick="deleteCart('{{$product['id_price'] }}')" class="deleteItem"> Delete</button>
                                    </div>
                                </figcaption>
                            </figure> 
                        </div> <!-- col.// -->
                        <div class="col-md-2 text-md-right text-right"> 
                            <div class="input-group input-spinner">
                                <input type="text" class="form-control"  value=" {{$product['size']}}">
                            </div> <!-- input-group.// -->
                        </div>
                        <div class="col-md-4 text-md-right text-right"> 
                            <div class="input-group input-spinner">
                            <div class="input-group-prepend">
                                <button class="btn btn-light" type="button" id="button-plus" onclick="addNumberItem('{{$product['id_price'] }}')"> <i class="fa fa-plus"></i> </button>
                            </div>
                            <input type="text" class="form-control" id="quantyProduct{{$product['id_price'] }}"  value=" {{$product['quanty']}}">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button" id="button-minus" onclick="deleteNumberItem('{{$product['id_price'] }}')"> <i class="fa fa-minus"></i> </button>
                            </div>
                            </div> <!-- input-group.// -->
                        </div>
                    </div> <!-- row.// -->
                </article> <!-- card-group.// -->
            @endforeach
        </aside> <!-- col.// -->
        <aside class="col-md-3 border-left">
            <div class="card-body">
                <dl class="dlist-align">
                <dt>Total price:</dt>
                <dd class="text-right" id="totalPrice">{{Session::get('cart')->totalPrice}}</dd> VNĐ
                </dl>
                <dl class="dlist-align">
                <dt>Discount:</dt>
                <dd class="text-right text-danger"></dd>
                </dl>
                <dl class="dlist-align">
                <dt>Total:</dt>
                <dd class="text-right text-dark b"><strong>{{Session::get('cart')->totalPrice}} </strong></dd> VNĐ
                </dl>
                <hr>
                <a href="#" class="btn btn-primary btn-block"> Thanh toán </a>
                <a href="/" class="btn btn-light btn-block">Tiếp tục mua hàng</a>
            </div> <!-- card-body.// -->
        </aside> <!-- col.// -->
        @else
        Chưa có sản phẩm nào trong giỏ hàng
        @endif
    </div> <!-- row.// -->
</div> <!-- card.// -->
@endsection

@push('footer')
<script>
    function deleteCart(id){
        $.ajax({
            url: "/deleteCart/" +id,
            type:"GET",
            success: function(result){
                // console.log(result);
                $('#cart-body').empty();
                $('#cart-body').html(result);
                $('#cart').text($('#totalquanty').val())
                console.log($('#totalquanty').val());
            }
        });
    };
</script>

<script>
    function deleteNumberItem(id){
        var priceItems=$('#price'+id).val();
        var number=$('#quantyProduct'+id).val();
        var price= priceItems/number;
        // console.log(price);
        if(number==1){
            $('#quantyProduct'+id).attr('value',number);
            $('#price'+id).attr('value',price);
            $('#priceshow'+id).html(price);
        }else{
            number--;
            $('#quantyProduct'+id).attr('value',number);
            $('#price'+id).attr('value',price*number);
            $('#priceshow'+id).html(price*number);
            $.ajax({
                url: "/updateItemCart/" +id,
                type:"GET",
                data:  {number:number,price:price},
                success: function(result){
                    $('#cart-body').empty();
                    $('#cart-body').html(result);
                    $('#cart').text($('#totalquanty').val())
                }
            });
        }
       
    };
</script>

<script>
    function addNumberItem(id){
        var priceItems=$('#price'+id).val();
        var number=$('#quantyProduct'+id).val();
        var price= priceItems/number;
        number++;
        $('#quantyProduct'+id).attr('value',number);
        $('#price'+id).attr('value',price*number);
        $('#priceshow'+id).html(price*number);
        $.ajax({
            url: "/updateItemCart/" +id,
            type:"GET",
            data:  {number:number,price:price},
            success: function(result){
                $('#cart-body').empty();
                $('#cart-body').html(result);
                $('#cart').text($('#totalquanty').val())

            }
        });
    };
</script>

<!-- <script>
	$(document).ready(function(){
		$('#button-plus').click(function(){
			var number=$('#quantyProduct').val();
            number++;
            console.log(number);
			$('#quantyProduct').attr('value',number);
		});
	});

    $(document).ready(function(){
		$('#button-minus').click(function(){
			var number=$('#quantyProduct').val();
            number--;
            if(number<0) number=0
            console.log(number);
			$('#quantyProduct').attr('value',number);
		});
	});
</script> -->

@endpush


