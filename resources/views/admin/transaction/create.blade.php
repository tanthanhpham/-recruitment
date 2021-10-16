@extends('guest.layout')

@section('main')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="route('transaction.create')" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Chi tiết thanh toán</h6>
                            <div class="checkout__input">
                                <p>Họ tên<span>*</span></p>
                                <input type="text" name="name">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" placeholder="Số nhà, tên đường, quận/huyện..." class="checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <input type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm  <span>Tổng</span></div>
                                <ul class="checkout__total__products">
                                    @php
                                        $i=1;
                                    @endphp
                                    @if (Session::has('cart')!=null)
                                        @foreach(Session::get('cart')->products as $product)
                                            <li>{{$i++}}. {{$product['product']->name}} x {{$product['quanty']}} <span>{{$product['price']}}đ</span></li>
                                        @endforeach
                                    @endif
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Giảm giá <span>0đ</span></li>
                                    <li>Tổng <span>{{Session::get('cart')->totalPrice}}đ</span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Thanh toán trực tiếp khi nhận hàng
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Thanh toán tài khoản ngân hàng
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection