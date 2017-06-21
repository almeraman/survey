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
            <td><a href="{{route('take-survey',['id' => $survey->id])}}" class="btn btn-md btn-primary">Take Survey</a>
                {{--<button type="button" id="survey_{{$survey->id}}" class="btn btn-primary"></button></td>--}}
        </tr>
        @endforeach
    </table>




@stop