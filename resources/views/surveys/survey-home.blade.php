@extends('layouts.app')

@section('survey_heading', 'Available Surveys')

@section('content')
    @foreach($companies as $company)
        @if($company->surveys->first()->end_date > $now)
            <h4><strong>{{$company->name}}</strong></h4>
            <ul>
            @foreach($company->surveys as $survey)
                @if(!Auth::user()->surveys->find($survey->id))
                    @if(Auth::user()->age > $survey->age_range_min && Auth::user()->age < $survey->age_range_max)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$survey->id}}">{{$survey->title}}</button>

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
                        <button type="button" class="btn btn-primary" disabled>{{$survey->title}}</button>
                @endif
            @endforeach
        </ul>
        <hr>
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
            success: function(data) {

            },
            error: function(data){
                alert("fail");
            }
        });
    }
</script>
@stop