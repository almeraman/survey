@extends('guest.guest_app')

@section('survey_heading', 'Not a valid survey')

@section('content_once')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default" style="border-width:medium;">
                    <div class="panel-body">
                        <h3><strong>Sorry the survey you are looking for can not be found here.<br>
                                <br>It might not exist or has expired.</strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
