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
                                <input type="text" name="name" id="name">
                                <span id="error_name"></span>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="address" id="address" placeholder="Số nhà, tên đường, quận/huyện..."  class="checkout__input__add">
                                <span id="error_address"></span>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text" name="phone_number" id="phone">
                                        <span id="error_phone"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" id="email">
                                        <span id="error_email"></span>
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
                                <button type="submit" class="site-btn" id="checkout">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('footer')
<script>
    $(document).ready(function(){
        $('#email').change(function(){
            var error_email = '';
            var email = $('#email').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!filter.test(email)){    
                $('#email').addClass('has-error');
                $('#error_email').html('<label class="text-danger">Email không hợp lệ</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_email').html(' ');
                $('#email').removeClass('has-error');
                $('#checkout').attr('disabled', false);
            }
        });
    });

    $(document).ready(function(){
        $('#phone').change(function(){
            var error_phone = '';
            var phone = $('#phone').val();
            var filter_phone = /((09|03|07|08|05)+([0-9]{8})\b)/g;;
            if(!filter_phone.test(phone)){    
                $('#phone').addClass('has-error');
                $('#error_phone').html('<label class="text-danger">Số điện thoại không hợp lệ</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_phone').html(' ');
                $('#phone').removeClass('has-error');
                $('#checkout').attr('disabled', false);
            }
        });
    });


    $(document).ready(function(){
        $('#checkout').click(function(){
            var name=$('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var address = $('#address').val();
            if(name==""){
                $('#error_name').html('<label class="text-danger">Vui long điền Họ tên của bạn</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_name').html(' ');
                $('#checkout').attr('disabled', false);
            }

            if(address==""){
                $('#error_address').html('<label class="text-danger">Vui lòng điền địa chỉ nhận hàng</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_address').html(' ');
                $('#checkout').attr('disabled', false);
            }

            if(email==""){
                $('#error_email').html('<label class="text-danger">Vui lòng điền email của bạn</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_email').html(' ');
                $('#checkout').attr('disabled', false);
            }

            if(phone==""){
                $('#error_phone').html('<label class="text-danger">Vui lòng điền số điện thoại của bạn</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_phone').html(' ');
                $('#checkout').attr('disabled', false);
            }
        });
    });

    $(document).ready(function(){
        $('#address').change(function(){
            var address = $('#address').val();
            if(address==""){
                $('#error_address').html('<label class="text-danger">Vui lòng điền địa chỉ nhận hàng</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_address').html(' ');
                $('#checkout').attr('disabled', false);
            }
        });
    });

    $(document).ready(function(){
        $('#name').change(function(){
            var name = $('#name').val();
            if(name==""){
                $('#error_name').html('<label class="text-danger">Vui long điền Họ tên của bạn</label>');
                $('#checkout').attr('disabled', 'disabled');
            }else{
                $('#error_name').html(' ');
                $('#checkout').attr('disabled', false);
            }
        });
    });
</script>
@endpush