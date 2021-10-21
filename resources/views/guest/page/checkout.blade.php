@extends('guest.layout')

@section('main')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{route('transaction.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Thông tin thanh toán</h6>
                            <div class="checkout__input">
                                <p>Họ tên<span>*</span></p>
                                <input type="text" name="name">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="address" placeholder="Số nhà, tên đường, quận/huyện..." class="checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text" name="phone_number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú</p>
                                <input type="text" placeholder="" name="note">
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
                                            <li>{{$i++}}. {{$product['product']->name}} x {{$product['quanty']}} <span>{{$product['price']}} đ</span></li>
                                        @endforeach
                                    @endif
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Tổng <span>{{Session::get('cart')->totalPrice}} đ</span></li>
                                    <input type="hidden" name="total" value="{{Session::get('cart')->totalPrice}}">
                                </ul>
                                <div>
                                    <label for="paypal">
                                        <input type="radio" name="payment" id="paypal" value="Thanh toán tài khoản ngân hàng">
                                        Thanh toán tài khoản ngân hàng
                                        <br>
                                        Ngân hàng: Sacombank
                                        <br>
                                        Chủ sở hửu: Phạm Tấn Thành
                                        <br>
                                        Số tài khoản: 0711228910
                                        
                                    </label>
                                </div>
                                <div>
                                    <label for="payment">
                                        <input type="radio" name="payment" id="payment" value="Thanh toán trực tiếp khi nhận hàng">
                                        Thanh toán trực tiếp khi nhận hàng
                                        <!-- <span class="checkmark"></span> -->
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