<!-- Shopping Cart Section Begin -->

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
                                                    {{$price}} đ
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
                                        <td class="cart__price" id="priceshow{{$product['id_price']}}>{{$product['price']}}">{{$product['price']}} đ</td>
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
                            <li>Tổng tiền <span  id="totalPrice">{{Session::get('cart')->totalPrice}} đ</span> </li>
                        </ul>
                        <a href="{{route('guest.checkout')}}" class="primary-btn">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        @else
            Giỏ hàng trống.
        @endif
    </div>
    <input type="hidden" id="totalquanty" value="@if(Session::has('cart')!=null){{Session::get('cart')->totalQuanty}} @else 0 @endif">
<!-- Shopping Cart Section End -->