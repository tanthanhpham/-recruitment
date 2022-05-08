@extends('admin.salaries.layout', [
    'title' => ( $title ?? 'Edit salary' )
])

@section('content')
    <form action="{{route('salary.update', ['id' => $salary->id])}}" method="POST">
        @csrf
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row g-gs">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="lower">Lower limit</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="lower" name="lower_limit" value="{{$salary->lower_limit}}" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="upper">Upper limit</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="upper" name="upper_limit" value="{{$salary->upper_limit}}" required="">
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
