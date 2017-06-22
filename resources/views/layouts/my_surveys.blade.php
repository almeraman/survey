@extends('layouts.app')

@section('survey_heading', 'My Surveys')

@section('content')
    <table class="table table-bordered">
        <thead>
            <th colspan="2">Available Surveys</th>
        </thead>
        @foreach($surveys as $survey)
        <tr>
            <td><strong>{{$survey->title}}</strong> ( {{$survey->company_name}} )</td>
            @if(!Auth::user()->answers->where('survey_id', $survey->id)->first())
                <td><a href="{{route('take-survey',['id' => $survey->id])}}" class="btn btn-md btn-primary">Take Survey</a>
            @else
                <td><button class="btn btn-md btn-primary" disabled>Survey Taken</button>
            @endif
        </tr>
        @endforeach
    </table>




@stop