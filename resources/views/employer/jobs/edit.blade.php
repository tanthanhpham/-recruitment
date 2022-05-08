@extends('employer.jobs.layout')

@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Job information</h4>
                <div class="nk-block-des">
                    <p>Please fill out all of information below</p>
                </div>
            </div>
        </div>
        <form action="{{route('job.update', ['id' => $job->id])}}" method="POST">
            @csrf
            <div class="card card-preview">
                <div class="card-inner">
                    <div class="preview-block">
                        <span class="preview-title-lg overline-title">General information</span>
                        <div class="row gy-4">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Job name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="name" id="name" value="{{$job->name}}" placeholder="Job name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="place">Place</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="place" id="place" value="{{$job->position}}" placeholder="Place">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="number">Number of employee</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="number" id="number" value="{{$job->number}}"  placeholder="Amount of number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="brief">Brief description</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="brief" class="form-control">{{$job->brief}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Job description</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="description" class="summernote-basic">{{$job->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Extra requirement</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="requirement" class="summernote-basic">{{$job->requirement}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Benefit</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="benefit" class="summernote-basic">{{$job->benefit}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="field">Field</label>
                                    <div class="form-control-wrap">
                                        <div class="form-control-select-multiple">
                                            <select class="custom-select" id="field" multiple="" name="field">
                                                @foreach($fields as $field)
                                                    <option value="{{ $field->id }}" @if($job->field_id == $field->id) selected @endif>{{ $field->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="salary">Salary</label>
                                    <div class="form-control-wrap">
                                        <div class="form-control-select-multiple">
                                            <select class="custom-select" id="salary" multiple="" name="salary">
                                                @foreach($salaries as $salary)
                                                    <option value="{{ $salary->id}}" @if($job->salary_id == $salary->id) selected @endif>{{ $salary->lower_limit }} - {{ $salary->upper_limit }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="position">Position</label>
                                    <div class="form-control-wrap">
                                        <div class="form-control-select-multiple">
                                            <select class="custom-select" id="position" multiple="" name="position">
                                                @foreach($positions as $position)
                                                    <option value="{{ $position->id}}" @if($job->rank_id == $position->id) selected @endif>{{ $position->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="language">Languages</label>
                                    <div class="form-control-wrap">
                                        <div class="form-control-select-multiple">
                                            <select class="custom-select" id="language" multiple="" name="language">
                                                @foreach($languages as $language)
                                                    <option value="{{ $language->id}}" @if($job->language_id == $language->id) selected @endif>{{ $language->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="field">Certificate</label>
                                    <div class="form-control-wrap">
                                        <div class="form-control-select-multiple">
                                            <select class="custom-select" id="field" multiple="" name="certificate">
                                                @foreach($certificates as $certificate)
                                                    <option value="{{ $certificate->id }}" @if($job->certificate_id == $certificate->id) selected @endif>{{ $certificate->bangcap_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-primary">Save Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .card-preview -->
        </form>
    </div>
@endsection

@push('footer')
    <script src="{{ asset('dashlite/assets/js/bundle.js?ver=2.5.0')}}"></script>
    <script src="{{ asset('dashlite/assets/js/scripts.js?ver=2.5.0')}}"></script>
    <link rel="stylesheet" href="{{ asset('dashlite/assets/css/editors/summernote.css?ver=2.5.0')}}">
    <script src="{{ asset('dashlite/assets/js/libs/editors/summernote.js?ver=2.5.0')}}"></script>
    <script src="{{ asset('dashlite/assets/js/editors.js?ver=2.5.0')}}"></script>
@endpush

