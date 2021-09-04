@extends('admin.product.layout', [
    'title' => ( $title ?? 'Product List' )
])

@section('content')
<div class="nk-block">
    @if($categories->count() == 0)
        <div class="card-inner p-0">
            <div class="alert m-0">
                <div class="alert alert-warning alert-icon">
                    <em class="icon ni ni-alert-circle"></em> Bạn chưa có loại sản phẩm. Vui lòng <a href="{{ route('product_category.create') }}">tạo loại sản phẩm </a> trước. 
                </div>
            </div>
        </div>
    @endif
    @if($brands->count() == 0)
        <div class="card-inner p-0">
            <div class="alert m-0">
                <div class="alert alert-warning alert-icon">
                    <em class="icon ni ni-alert-circle"></em> Bạn chưa có thương hiệu nào. Vui lòng <a href="{{ route('brand.create') }}">tạo thương hiệu</a> trước.

                </div>
            </div>
        </div>
    @endif
    @if($products->count()==0)
        <div class="card-inner p-0">
            <div class="alert m-0">
                <div class="alert alert-warning alert-icon">
                    <em class="icon ni ni-alert-circle"></em> Bạn chưa có sản phẩm nào, <a href="{{ route('product.create') }}">tạo sản phẩm</a>.

                </div>
            </div>
        </div>
    @else
        <div class="card card-bordered">
            <div class="card-inner-group">
                <div class="card-inner p-0">
                    <div class="nk-tb-list">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="pid">
                                    <label class="custom-control-label" for="pid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                            <div class="nk-tb-col"><span>Price</span></div>
                            <div class="nk-tb-col"><span>Stock</span></div>
                            <div class="nk-tb-col"><span>Brand</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Category</span></div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <!-- <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="mr-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul> -->
                            </div>
                        </div><!-- .nk-tb-item -->
                        @foreach($products as $i => $product)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="pid{{$i}}">
                                    <label class="custom-control-label" for="pid{{$i}}"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-sm">
                                <span class="tb-product">
                                    <img src="{{URL::to('storage/'.$product->image)}}" alt="" class="thumb">
                                    <span class="title">{{$product->name}}</span>
                                </span>
                            </div>
                        
                            <div class="nk-tb-col">
                                <span class="tb-lead">$ 99.49</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-sub">49</span>
                            </div>
                            <div class="nk-tb-col">
                                @foreach($brands as $brand)
                                    <span class="tb-sub">@if($product->brand_id==$brand->id) {{$brand->name}}@endif</span>
                                @endforeach
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                @foreach($categories as $category)
                                    <span class="tb-sub">@if($product->category_id==$category->id) {{$category->name}}@endif</span>
                                @endforeach
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="mr-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{route('product.edit',['id' => $product->id])}}"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                    <li><a href="{{route('product.show',['id' => $product->id])}}"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                    <li><a href="{{route('product.delete',['id' => $product->id])}}"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->
                        @endforeach
                    </div><!-- .nk-tb-list -->
                </div>
                <div class="card-inner">
                    <div class="nk-block-between-md g-3">
                        <div class="g">
                            <ul class="pagination justify-content-center justify-content-md-start">
                                <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-left"></em></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#"><em class="icon ni ni-chevrons-right"></em></a></li>
                            </ul><!-- .pagination -->
                        </div>
                        <div class="g">
                            <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                <div>Page</div>
                                <div>
                                    <select class="form-select form-select-sm select2-hidden-accessible" data-search="on" data-dropdown="xs center" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="page-1" data-select2-id="3">1</option>
                                        <option value="page-2">2</option>
                                        <option value="page-4">4</option>
                                        <option value="page-5">5</option>
                                        <option value="page-6">6</option>
                                        <option value="page-7">7</option>
                                        <option value="page-8">8</option>
                                        <option value="page-9">9</option>
                                        <option value="page-10">10</option>
                                        <option value="page-11">11</option>
                                        <option value="page-12">12</option>
                                        <option value="page-13">13</option>
                                        <option value="page-14">14</option>
                                        <option value="page-15">15</option>
                                        <option value="page-16">16</option>
                                        <option value="page-17">17</option>
                                        <option value="page-18">18</option>
                                        <option value="page-19">19</option>
                                        <option value="page-20">20</option>
                                    </select>
                                </div>
                                <div>OF 102</div>
                            </div>
                        </div><!-- .pagination-goto -->
                    </div><!-- .nk-block-between -->
                </div>
            </div>
        </div>
    @endif
</div>
@endsection