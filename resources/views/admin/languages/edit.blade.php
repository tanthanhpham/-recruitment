@extends('admin.languages.layout', [
    'title' => ( $title ?? 'Edit language' )
])

@section('content')
    <form action="{{route('language.update', ['id' => $language->id])}}" method="POST">
        @csrf
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row g-gs">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Ngoại ngữ</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name" value="{{$language->name}}" required="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" id="register" class="btn btn-lg btn-primary">Save Informations</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
