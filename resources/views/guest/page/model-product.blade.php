
<div class="col-md-6">
    <img src="{{asset('storage/'.$product->image)}}" alt="" srcset="">
</div>
<div class="col-md-6">
    <form action="{{route('guest.addToCart')}}" action="get">
        <h4>{{$product->name}}</h4>
            <span>Size:</span>
            @foreach($product->size as $i => $size)
                
            <div class="custom-control custom-radio">
                <input type="radio" name="size" @if($i==0) checked="" @endif value ="{{$size->id}}" id="size{{$size->name}}" >
                <label class="" for="size{{$size->name}}">{{$size->name}}</label>
            </div>
                <input type="hidden" id="pro_id" name="product_id" value="{{$product->id}}">
                
            @endforeach
     
        <div class="product__details__cart__option d-flex justify-content-center">
            <button type="submit" class="primary-btn addToCart">Thêm vào giỏ hàng</button>
        </div>
    </form>
    <div class="product__details__cart__option d-flex justify-content-center">
        <a class="primary-btn" href="{{route('guest.show',['id' => $product->id])}}" >Xem chi tiết</a>
    </div>
</div>
    
