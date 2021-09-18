@extends('guest.page.layout', [
    'title' => ( $title ?? 'Danh sách sản phẩm' )
])

@section('content')

@if($products->count()==0)
    <h5 class="section-title">Hiện tại không tồn tại sản phẩm loại này</h5>
@else
    <h5 class="section-title">Các sản phẩm {{$category->name}}</h5>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="{{route('guest.show',['id' => $product->id])}}" class="img-wrap"> <img src="{{asset('storage/'.$product->image)}}"> </a>
                    <figcaption class="info-wrap">
                        <a href="{{route('guest.show',['id' => $product->id])}}" class="title">{{$product->name}}</a>
                        @foreach($product->size as $i => $size)
                            @if($i==0)
                                <div class="price mt-1">{{$size->product_price->price}} VNĐ</div> <!-- price-wrap.// -->
                            @endif
                        @endforeach
                    </figcaption>
                </div>
            </div> <!-- col.// -->
        @endforeach
    @endif
</div>
<div class="card-inner">
    <div class="nk-block-between-md g-3">
        <div class="g">
            {!!$products->links('pagination::bootstrap-4')!!}
        </div>
    </div><!-- .nk-block-between -->
</div>
@endsection