@extends('layouts.app')

@section('survey_heading', 'My Surveys')

@section('content')
    <h2>Available Surveys</h2>
    <table class="table table-bordered">
        <thead>
        <th class="col-md-4">Survey Name</th>
        <th class="col-md-4">Expires</th>
        <th class="col-md-2"></th>
        </thead>
        @foreach($surveys->where('end_date', '>=', $now) as $survey)    
            <tr>
            @if(!Auth::user()->answers->where('survey_id', $survey->id)->first())
                <td><strong>{{$survey->title}}</strong> ( {{$survey->companies->first()->name}} )</td>
                <td> {{date('F d, Y \a\t h:i:s A', strtotime($survey->end_date))}}</td>
                <td><a href="{{route('take-survey',['id' => $survey->id])}}" class="btn btn-md btn-primary">Take Survey</a>
            @endif
        </tr>
        @endforeach
    </table>




@stop