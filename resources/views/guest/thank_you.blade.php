@extends('guest.guest_app')

@section('survey_heading', 'Goodbye')

@section('content_once')

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-default" style="border-width:medium;">
                            <div class="panel-heading" style="background-color: #3097D1; font-weight: bold">Thank you</div>
                            <div class="panel-body">
                                <h3><strong>Your answers have been submitted.</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
