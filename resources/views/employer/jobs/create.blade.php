@extends('employer.jobs.layout')

@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Job information</h4>
                <div class="nk-block-des">
                    <p>Please fill out ...</p>
                </div>
            </div>
        </div>
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
                                <label class="form-label" for="position">Position</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="position" id="position" placeholder="Position">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="brief">Brief description</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control no-resize" name="brief" id="brief">Brief description</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="field">Field</label>
                                <div class="form-control-wrap">
                                    <div class="form-control-select-multiple">
                                        <select class="custom-select" id="field" multiple="">
                                            <option value="option_select0">Default Option</option>
                                            <option value="option_select1">Option select name</option>
                                            <option value="option_select2">Option select name</option>
                                            <option value="option_select2">Option select name</option>
                                            <option value="option_select2">Option select name</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="preview-hr">
                    <span class="preview-title-lg overline-title">Requirement</span>
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea name="requirement" class="summernote-basic"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-1-02">Filled State</label>
                                <input type="text" class="form-control" id="default-1-02" value="Abu Bin Ishtiyak">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-1-04">Error State</label>
                                <input type="text" class="form-control error" id="default-1-04" placeholder="Input placeholder">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-1-03">Disabled State</label>
                                <input type="text" class="form-control" id="default-1-03" disabled="" value="info@softnio.com">
                            </div>
                        </div>
                    </div>
                    <hr class="preview-hr">
                    <span class="preview-title-lg overline-title">Size Preview </span>
                    <div class="row gy-4 align-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-lg" placeholder="Input Large">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" placeholder="Input Regular">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-sm" placeholder="Input Small">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="text-soft">Use <code>.form-control-lg</code> or <code>.form-control-sm</code> with <code>.form-control</code> for large or small input box.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .card-preview -->
    </div>
@endsection

@push('footer')
    <script src="{{ asset('dashlite/assets/js/bundle.js?ver=2.5.0')}}"></script>
    <script src="{{ asset('dashlite/assets/js/scripts.js?ver=2.5.0')}}"></script>
    <link rel="stylesheet" href="{{ asset('dashlite/assets/css/editors/summernote.css?ver=2.5.0')}}">
    <script src="{{ asset('dashlite/assets/js/libs/editors/summernote.js?ver=2.5.0')}}"></script>
    <script src="{{ asset('dashlite/assets/js/editors.js?ver=2.5.0')}}"></script>
@endpush
