@extends('admin.brand.layout', [
    'title' => ( $title ?? 'Brand List' )
])

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-bordered">
            <div class="card-inner-group">
                @if($brands->count() == 0)
                    <div class="card-inner p-0">
                        <div class="alert m-0">
                            <div class="alert alert-warning alert-icon">
                                <em class="icon ni ni-alert-circle"></em> Bạn chưa có thương hiệu nào</a>.

                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-inner p-0">
                        <div class="nk-tb-list">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="pid">
                                        <label class="custom-control-label" for="pid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span>Name</span></div>
                                <div class="nk-tb-col"><span>Slug</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <!-- <ul class="nk-tb-actions gx-1 my-n1">
                                        <li class="mr-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                               
                                            </div>
                                        </li>
                                    </ul> -->
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach($brands as $i => $brand)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="pid{{$i}}">
                                            <label class="custom-control-label" for="pid{{$i}}"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="tb-product">
                                            <span class="title">{{ $brand->name }}</span>
                                        </span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="badge">{{ $brand->slug }}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="mr-n1">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="{{route('brand.edit', ['id' => $brand->id])}}">
                                                                    <em class="icon ni ni-edit"></em><span>Edit brand</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('brand.delete', ['id' => $brand->id])}}">
                                                                    <em class="icon ni ni-trash"></em><span>Delete brand</span>
                                                                </a>
                                                            </li>
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
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{route('brand.store')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row g-gs">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Brand Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="name" name="name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="slug">Slug</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="slug" name="slug" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Image</label>
                                        <div class="form-control-wrap">
                                            <div class="input-group">
                                                <input type="file" class="custom-file-input" id="image" name="image" required="">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex justify-content-center">
                                        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection