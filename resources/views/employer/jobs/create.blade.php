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
        <form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Job name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="preview-block">
                                        <label class="form-label preview-block" style="display: block" for="place">Shift</label>
                                        <div class="custom-control custom-radio checked">
                                            <input type="radio" id="parttime" name="shift" class="custom-control-input">
                                            <label class="custom-control-label" for="parttime">Part time</label>
                                        </div>
                                        <div class="custom-control custom-radio checked">
                                            <input type="radio" id="fulltime" name="shift" class="custom-control-input">
                                            <label class="custom-control-label" for="fulltime">Full time</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="place">Place</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="place" id="place" placeholder="Place">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="number">Number of employee</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" name="number" id="number" placeholder="Amount of number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="brief">Brief description</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="brief" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="brief">End date</label>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right xl">
                                            <em class="icon ni ni-calendar-alt"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined date-picker" name="end_date" id="outlined-date-picker">
                                        <label class="form-label-outlined" for="outlined-date-picker">Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Default Image</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Job description</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="description" class="summernote-basic"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Extra requirement</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="requirement" class="summernote-basic"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Benefit</label>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <textarea name="benefit" class="summernote-basic"></textarea>
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
                                                    <option value="{{ $field->id }}">{{ $field->name }}</option>
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
                                                    <option value="{{ $salary->id}}">{{ $salary->lower_limit }} - {{ $salary->upper_limit }} </option>
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
                                                    <option value="{{ $position->id}}">{{ $position->title }}</option>
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
                                                    <option value="{{ $language->id}}">{{ $language->name }}</option>
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
                                                    <option value="{{ $certificate->id }}">{{ $certificate->bangcap_ten }}</option>
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
