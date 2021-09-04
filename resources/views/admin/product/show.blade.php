@extends('admin.product.layout', [
    'title' => ( $title ?? 'Product detail' )
])

@section('content')
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row pb-5">
                <div class="col-lg-6">
                    <div class="product-gallery mr-xl-1 mr-xxl-5">
                        <img src="{{asset('storage/'.$product->image)}}" alt="">
                    </div>
                </div><!-- .col -->
                <div class="col-lg-6">
                    <div class="product-info mt-5 mr-xxl-5">
                        <h4 class="product-price text-primary">$78.00 <small class="text-muted fs-14px">$98.00</small></h4>
                        <h2 class="product-title">{{$product->name}}</h2>
                      
                        <div class="product-excrept text-soft">
                            <p class="lead">{{$product->discription}}</p>
                        </div>
                        <div class="product-meta">
                            <ul class="d-flex g-3 gx-5">
                                <li>
                                    <div class="fs-14px text-muted">Brand</div>
                                    <div class="fs-16px fw-bold text-secondary">
                                        @foreach($brands as $brand) 
                                            @if($product->brand_id==$brand->id)
                                                {{$brand->name}}
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <div class="fs-14px text-muted">Category</div>
                                    <div class="fs-16px fw-bold text-secondary">
                                        @foreach($categories as $category) 
                                            @if($product->category_id==$category->id)
                                                {{$category->name}}
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="product-meta">
                            <h6 class="title">Size</h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-radio custom-control-pro no-control checked">
                                        <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck1">
                                        <label class="custom-control-label" for="sizeCheck1">XS</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio custom-control-pro no-control">
                                        <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck2">
                                        <label class="custom-control-label" for="sizeCheck2">SM</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio custom-control-pro no-control">
                                        <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck3">
                                        <label class="custom-control-label" for="sizeCheck3">L</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio custom-control-pro no-control">
                                        <input type="radio" class="custom-control-input" name="sizeCheck" id="sizeCheck4">
                                        <label class="custom-control-label" for="sizeCheck4">XL</label>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- .product-meta -->
                        <div class="product-meta">
                            <h6 class="title">Ingredient</h6>
                            <p class="lead">{{$product->ingredient}}</p>
                        </div><!-- .product-meta -->
                        <div class="product-meta">
                            <h6 class="title">Direction</h6>
                            <p class="lead">{{$product->direction}}</p>
                        </div><!-- .product-meta -->
                    </div><!-- .product-info -->
                </div><!-- .col -->
            </div><!-- .row -->
            <hr class="hr border-light">
        </div>
    </div>
</div>
@endsection
