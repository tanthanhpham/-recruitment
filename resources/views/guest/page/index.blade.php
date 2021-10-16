@extends('guest.layout')


@section('main')
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{route('guest.search')}}" method="GET">
                                <input type="text" name="keyword" placeholder="Tìm kiếm...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Lọc theo giá</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__search ">
                                                <form action="{{route('guest.search')}}" method="GET" class="d-flex flex-row">
                                                    <div class="col-md-6 m p-0">
                                                        <input type="text" name="min-price" placeholder="Giá thấp nhất">
                                                    </div>
                                                    <div class="col-md-6 m-0 p-0">
                                                        <input type="text" name="max-price" placeholder="Giá cao nhất">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Loại sản phẩm</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($categories as $cate)
                                                        <li><a href="{{route('guest.getCategory',['id' => $cate->id] )}}">{{$cate->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Thương hiệu</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    @foreach($brands as $brand)
                                                        <li><a href="#">{{$brand->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sắp xếp theo: </p>
                                    <select>
                                        <option value="">Giá từ cao đến thấp</option>
                                        <option value="">Giá từ thấp đến cao</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'.$product->image)}}">
                                      
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{$product->name}}</h6>
                                        <a href="{{route('guest.show',['id' => $product->id])}}" class="add-cart">Xem chi tiết</a>
                                        @foreach($product->size as $i => $size)
                                            @if($i==0)
                                                <h5>{{$size->product_price->price}} VNĐ</h5>
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
                            @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                {!!$products->links('pagination::bootstrap-4')!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection

@push('footer')
<script>
    function addToCart(id){
        $.ajax({
            url: "/addCart/" +id,
            type:"GET",
            success: function(result){
                console.log(result);
                $('#cart').html(result);
            }
        });
    };
</script>
@endpush