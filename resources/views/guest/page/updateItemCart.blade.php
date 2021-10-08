<div>
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
                                    <strong class="">{{$product['price']}}</strong>
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
                                <button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-plus"></i> </button>
                            </div>
                            <input type="text" class="form-control"  value=" {{$product['quanty']}}">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-minus"></i> </button>
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
                <dd class="text-right">{{Session::get('cart')->totalPrice}} VNĐ</dd>
                </dl>
                <dl class="dlist-align">
                <dt>Discount:</dt>
                <dd class="text-right text-danger">- 13.00 VNĐ</dd>
                </dl>
                <dl class="dlist-align">
                <dt>Total:</dt>
                <dd class="text-right text-dark b"><strong>80.45 VNĐ</strong></dd>
                </dl>
                <hr>
                <a href="#" class="btn btn-primary btn-block"> Make Purchase </a>
                <a href="#" class="btn btn-light btn-block">Continue Shopping</a>
            </div> <!-- card-body.// -->
        </aside> <!-- col.// -->
        @else
        Chưa có sản phẩm nào trong giỏ hàng
        @endif
    </div> <!-- row.// -->
    <input type="hidden" id="totalquanty" value="@if(Session::has('cart')!=null){{Session::get('cart')->totalQuanty}} @else 0 @endif">
</div> <!-- card.// -->