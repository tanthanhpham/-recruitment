@extends('candidate.layout')

@section('main')
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="medium-title">
                        General information
                    </h2>
                    <div class="information">
                        <div class="contact-datails">
                            <div class="info">
                                <h3>Title</h3>
                                <span class="detail">{{$job->name}}</span>
                            </div>
                        </div>
                        <div class="contact-datails">
                            <div class="info">
                                <h3>Place</h3>
                                <span class="detail">{{$job->position}}</span>
                            </div>
                        </div>
                        <div class="contact-datails">
                            <div class="info">
                                <h3>Number</h3>
                                <span class="detail">{{$job->number}}</span>
                            </div>
                        </div>
                        <div class="contact-datails">
                            <div class="info">
                                <h3>Description</h3>
                                <span class="detail">{!! $job->description !!}</span>
                            </div>
                        </div>
                        <div class="contact-datails">
                            <div class="info">
                                <h3>Benefit</h3>
                                <span class="detail">{!! $job->benefit !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="medium-title">
                        Requirement
                    </h2>
                    <div class="information">
                        <div class="contact-datails">
                            <div class="icon">
                            </div>
                            <div class="info">
                                <span class="detail">{!! $job->requirement !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('candidate.apply')}}" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <label for="cv" style="text-align: left; font-size: 20px">Click here to apply your CV</label>
                            <input type="file" style="" class="form-control" name="file" id="cv">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                            @csrf
                            <input hidden name="id" value="{{$job->id}}">
                            <button type="submit" class="btn btn-common btn-rm">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
