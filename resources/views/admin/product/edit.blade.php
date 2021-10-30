@extends('admin.product.layout', [
    'title' => ( $title ?? 'Edit product' )
])

@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <form action="{{route('product.update',['id'=>$product->id])}}" class="form-validate" novalidate="novalidate" method="POST" enctype='multipart/form-data'>
        @csrf
            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Product Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required="" value="{{$product->name}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-9 float-left p-0">
                        <div class="form-group">
                            <label class="form-label" for="image">Image</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 float-right">
                        <img src="{{asset('storage/'.$product->image)}}" width=100p alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="brand_id">Brand</label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select select2-hidden-accessible" id="brand_id" name="brand_id" data-placeholder="Select a brand" required="" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true">
                                <option value="">Select a brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" @if($product->brand_id==$brand->id) selected @endif>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="category_id">Category</label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select select2-hidden-accessible" id="category_id" name="category_id" data-placeholder="Select a category" required="" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true">
                                <option label="empty" value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($product->category_id==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="discription">Discription</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm ckeditor" id="discription" name="discription" placeholder="Write your discription" required="">{{$product->discription}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="ingredient">Ingredient</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm ckeditor" id="ingredient" name="ingredient" placeholder="Write your ingredient" required="">{{$product->ingredient}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="direction">Direction</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm ckeditor" id="direction" name="direction" placeholder="Write your direction" required="">{{$product->direction}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection