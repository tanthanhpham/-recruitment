@extends('admin.product_category.layout', [
    'title' => ( $title ?? 'Add Category' )
])

@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <form action="{{route('product_category.store')}}" class="form-validate" novalidate="novalidate" method="GET">
        @csrf
        <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Category Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="alias">Alias</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="alias" name="alias" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="p_category_id">Parent Category</label>
                        <div class="form-control-wrap ">
                            <select class="form-control form-select select2-hidden-accessible" id="p_category_id" name="p_category_id" data-placeholder="Select a option" required="" data-select2-id="fva-topics" tabindex="-1" aria-hidden="true">
                                <option label="empty" value="" data-select2-id="4"></option>
                                <option value="0">Root Category</option>
                                @foreach($category as $cate)
                                    @if($cate->p_category_id==0)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>

                                        @foreach($category as $cate_sub)
                                            @if($cate_sub->p_category_id != 0 && $cate_sub->p_category_id==$cate->id)
                                                <option value="{{$cate_sub->id}}">-- {{$cate_sub->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="discription">Discription</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-sm" id="discription" name="discription" placeholder="Write your discription" required=""></textarea>
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