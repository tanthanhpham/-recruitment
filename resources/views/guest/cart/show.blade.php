@extends('guest.layout')

@section('main')
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad" id="cart-body">
    <div class="container">
        @if (Session::has('cart')!=null)
           
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Session::get('cart')->products as $product)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{asset('storage/'.$product['product']->image)}}" width="70px" alt="">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{$product['product']->name}}</h6>
                                                    <h6>
                                                        @php
                                                        $price=$product['price']/$product['quanty'];
                                                        @endphp
                                                        <?php echo number_format($price,0)."đ"; ?>
                                                    </h6>
                                                    <h6>
                                                        {{$product['size']}} 
                                                    </h6>
                                                </div>
                                            </td>
                                            <!-- <td class="quantity__item">
                                                <div class="quantity">
                                                    <input type="text" value=" {{$product['size']}}">
                                                </div>
                                            </td> -->
                                            <td class="quantity__item">
                                                <div class="quantity d-flex flex-row">
                                                    <div class="input-group-prepend ">
                                                        <button class="btn btn-light" type="button" id="button-plus" onclick="addNumberItem('{{$product['id_price'] }}')"> <i class="fa fa-plus" style="font-size: 80%"></i> </button>
                                                    </div>
                                                    <input type="text" class="form-control" id="quantyProduct{{$product['id_price'] }}"  value=" {{$product['quanty']}}" style="width:30%; text-align: center; margin-left:2px;margin-right:2px">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-light" type="button" id="button-minus" onclick="deleteNumberItem('{{$product['id_price'] }}')"> <i class="fa fa-minus" style="font-size: 80%"></i> </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price" id="priceshow{{$product['id_price']}}>{{$product['price']}}"><?php echo number_format($product['price'],0)."đ"; ?></td>

                                            <td class="cart__close" onclick="deleteCart('{{$product['id_price'] }}')" class="deleteItem"><i class="fa fa-close" ></i></td>
                                            <input type="hidden" id="price{{$product['id_price']}}" value="{{$product['price']}}">
                                            <input type="hidden" class="idPrice" value=" {{$product['id_price'] }} ">
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{ route('shop.index')}}">Tiếp tục mua hàng</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart__discount">
                        </div>
                        <div class="cart__total">
                            <h6>Tổng giỏ hàng</h6>
                            <ul>
                                <li>Tổng tiền <span  id="totalPrice"><?php echo number_format(Session::get('cart')->totalPrice,0)."đ"; ?></span> </li>
                            </ul>
                            <a href="{{route('guest.checkout')}}" class="primary-btn">Tiến hành thanh toán</a>
                        </div>
                    </div>
                </div>
        @else
            Giỏ hàng trống.
        @endif
    </div>
</section>
<!-- Shopping Cart Section End -->
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
        console.log(priceItems);
        var number=$('#quantyProduct'+id).val();
        var price= priceItems/number;
        console.log(number);
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


