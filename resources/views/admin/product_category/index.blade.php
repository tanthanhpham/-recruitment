@extends('admin.product_category.layout', [
    'title' => ( $title ?? 'Category List' )
])

@section('content')
<div class="card card-bordered card-preview">
    @if($category->count() == 0)
        <div class="card-inner p-0">
            <div class="alert m-0">
                <div class="alert alert-warning alert-icon">
                    <em class="icon ni ni-alert-circle"></em> Bạn chưa có loại sản phẩm, <a href="{{ route('product_category.create') }}">tạo loại sản phẩm</a>.
                </div>
            </div>
        </div>
    @else
    <table class="table table-tranx">
        <thead>
            <tr class="tb-tnx-head">
                <th class="tb-tnx-id"><span class="">#</span></th>
                <th class="tb-tnx-info">
                    <span class="tb-tnx-desc d-none d-sm-inline-block">
                        <span>Name</span>
                    </span>
                    <span class="tb-tnx-date d-md-inline-block d-none">
                        <span class="d-none d-md-block">
                            <span>Discription</span>
                        </span>
                    </span>
                </th>
                <th class="tb-tnx-amount is-alt">
                    <span class="tb-tnx-total">Parent Category</span>
                </th>
                <th class="tb-tnx-action">
                    <span>&nbsp;</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $i => $cate)
                <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">
                        <a href="#"><span>{{$i+1}}</span></a>
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                            <span class="title">{{$cate->name}}</span>
                        </div>
                        <div class="tb-tnx-date">
                            <span class="date">{{$cate->discription}}</span>
                        </div>
                    </td>
                    <td class="tb-tnx-amount is-alt">
                        <div class="tb-tnx-total">
                            @if($cate->p_category_id==0)
                                <span class="amount">Root</span>
                            @else
                                @foreach($category as $cat)
                                    <span class="amount">@if($cate->p_category_id == $cat->id) {{$cat->name}} @endif</span>
                                @endforeach
                            @endif
                        </div>
                    </td>
                    <td class="tb-tnx-action">
                        <div class="dropdown">
                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                <ul class="link-list-plain">
                                    <li><a href="{{URL::to('product_categories/edit/'.$cate->id)}}">Edit</a></li>
                                    <li><a href="{{URL::to('product_categories/delete/'.$cate->id)}}">Remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection