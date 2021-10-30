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
                                                <form action="{{route('guest.searchPrice')}}" method="GET" class="d-flex flex-row">
                                                    <div class="col-md-6 m p-0">
                                                        <input type="text" name="min_price" placeholder="Từ">
                                                    </div>
                                                    <div class="col-md-6 m-0 p-0">
                                                        <input type="text" name="max_price" placeholder="Đến">
                                                    </div>
                                                    <button type="submit">Lọc</button>
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
                                                        @if($cate->p_category_id == 0)
                                                            <li><a href="{{route('guest.getCategory',['id' => $cate->id] )}}">{{$cate->name}}</a></li>
                                                            @foreach($categories as $cate_sub)
                                                                @if($cate_sub->p_category_id !=0 && $cate_sub->p_category_id== $cate->id)
                                                                    <li><a href="{{route('guest.getCategory',['id' => $cate_sub->id] )}}">{{$cate_sub->name}}</a></li>
                                                                @endif
                                                            @endforeach
                                                        @endif
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
                                                        <li><a href="{{route('guest.getBrand',['id' => $brand->id] )}}">{{$brand->name}}</a></li>
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
                                        <a data-toggle="modal" data-target="#exampleModalLong" class="add-cart" onclick="selectProduct('{{$product->id}}')">Xem chi tiết</a>
                                        @foreach($product->size as $i => $size)
                                            @if($i==0)
                                                <h5>{{$size->product_price->price}} đ</h5>
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
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        
        <div class="modal-dialog modal-lg" >
        
        <div class="modal-content" >

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Thông sin sản phẩm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body d-flex justify-content-center" id="modelContent">

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

        </div>
       
        </div>
        
    </div>
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

<script>
    function selectProduct(id){ 
            $.ajax({
                url: "/findProduct/" +id,
                type:"GET",
                data:  {id:id},
                success: function(result){
                    console.log(result);
                    $('#modelContent').html(result);
                }
            });
    };
</script>
@endpush
