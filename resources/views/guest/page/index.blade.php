@extends('guest.layout')

@section('main')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="{{asset('./backgr1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6></h6>
                            <h2></h2>
                            <p></p>
                            <!-- <a href="{{route('shop.index')}}" class="primary-btn"></a> -->
                            <!-- <div class="hero__social">
                                <a href="https://www.facebook.com/ptthanhhhh"  target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/ptthanhhhh/"  target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="https://shopee.vn/"  target="_blank"><i class="fa fa-shopping-cart" ></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="{{asset('./backgr2.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <!-- <h6>Summer Collection</h6>
                            <h2>Fall - Winter Collections 2030</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                            commitment to exceptional quality.</p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<section class="banner spad" style="padding: 10px">
   
</section>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Sản phẩm mới</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach($products as $i => $product)
                @if($i < 8)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'.$product->image)}}">                           
                            </div>
                            <div class="product__item__text">
                                <h6>{{$product->name}}</h6>
                                <a href="{{route('shop.show',['id'=>$product->id])}}" class="add-cart">Chi tiết sản phẩm</a>
                                @foreach($product->size as $i => $size)
                                    @if($i==0)
                                        <h5> <?php echo number_format($size->product_price->price,0)."đ"; ?></h5>
                                    @endif
                                @endforeach
                                <div class="product__color__select">
                                @foreach($product->size as $i => $size)
                                    {{$size->name}}
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Thương hiệu</span>
                    <h2>Các đối tác</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('homepage/brand1.png')}}"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('homepage/brand2.png')}}"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('homepage/brand3.png')}}"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('homepage/brand4.png')}}"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->
@endsection