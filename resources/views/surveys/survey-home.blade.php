@extends('layouts.app')

@section('survey_heading', 'Available Surveys')

@section('content')
    @foreach($companies as $company)
        @if($company->surveys->first()->end_date >= $now)
            <h4><strong>{{$company->name}}</strong></h4>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th class="col-md-4">Survey Name</th>
                    <th class="col-md-3">Expires</th>
                    <th class="col-md-4"></th>
                </tr>
                </thead>
            @foreach($company->surveys as $survey)
                <tr>
                @if(!Auth::user()->surveys->find($survey->id))
                    @if(Auth::user()->age >= $survey->age_range_min && Auth::user()->age <= $survey->age_range_max)
                            <td>{{$survey->title}}</td>
                            <td> {{date('F d, Y \a\t h:i:s A', strtotime($survey->end_date))}}</td>
                            <td><button type="button" id="survey_button_{{$survey->id}}" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal_{{$survey->id}}">Take Survey</button></td>

                            <div id="myModal_{{$survey->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add Survey</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to add <strong>{{$survey->title}}</strong> to My Surveys.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addSurvey({{$survey->id}})">Add Survey</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @else
                        <p>No surveys open at this time</p>
                    @endif
                @else
                        <td>{{$survey->title}}</td>
                        <td> {{date('F d, Y \a\t h:i:s A', strtotime($survey->end_date))}}</td>
                        <td><button type="button" class="btn btn-primary pull-right" disabled>Added to My Surveys</button></td>
                @endif
                </tr>
            @endforeach
        </table>
        @endif
    @endforeach
    {{--<a href="{{ route('survey-coke') }}">Coke</a>--}}
@endsection
@section('scripts')
<script type="text/javascript">

    function addSurvey(id){
        $.ajax({
            type: "POST",
            url: "{{route('survey')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function() {
                $('#survey_button_'+id).attr('disabled', true).html('Added to My Surveys');
            },
            error: function(){
                alert("Something went wrong, please try again.");
            }
        });
    }
</script>
@stop