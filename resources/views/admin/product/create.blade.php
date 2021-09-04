@extends('admin.product.layout', [
    'title' => ( $title ?? 'Add product' )
])

@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <form class="form-validate" action="{{route('product.store')}}" id="dynamic_form" novalidate="novalidate" method="POST" enctype='multipart/form-data'>
        @csrf
            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Product Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required="">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="brand_id">Brand</label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select select2-hidden-accessible" id="brand_id" name="brand_id" data-placeholder="Select a brand" required="" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true">
                                <option value="">Select a brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
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
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="">Add Price</label>
                    <table class="" id="dynamicAddRemove">
                        <tr>
                            <td><input type="text" name="size[0]" placeholder="Enter size" class="form-control" />
                            </td>
                            <td><input type="text" name="price[0]" placeholder="Enter price" class="form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Price</button></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="discription">Discription</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="discription" name="discription" placeholder="Write your discription" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="ingredient">Ingredient</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="ingredient" name="ingredient" placeholder="Write your ingredient" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="direction">Direction</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="direction" name="direction" placeholder="Write your direction" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" id="button" class="btn btn-lg btn-primary">Save Informations</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection



