@extends('admin.fields.layout', [
    'title' => ( $title ?? 'Edit field' )
])

@section('content')
    <form action="{{route('field.update', ['id' => $field->id])}}" method="POST">
        @csrf
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="#" class="form-validate" novalidate="novalidate">
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Lĩnh vực</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$field->name}}" required="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" id="register" class="btn btn-lg btn-primary">Save Informations</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
@endsection
