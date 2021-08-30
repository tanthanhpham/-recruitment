@extends('admin.brand.layout', [
    'title' => ( $title ?? 'Edit Brand' )
])

@section('content')
<form action="{{route('brand.update', ['id' => $brand->id])}}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Brand Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" value="{{$brand->name}}"required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="slug">Slug</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="slug" name="slug" value = "{{$brand->slug}}"required="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="form-group">
                       <img src="{{URL::to('storage/'.$brand->image)}}" alt="" width=100p>
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
@endsection