@extends('layouts.app')

@section('survey_heading', $current_survey->title)

@section('content')

    <?php $count = 1 ?>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('answer') }}">
        {{ csrf_field() }}
    @foreach($current_survey->questions as $question)
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default" style="border-width:medium;">
                    <div class="panel-heading" style="background-color: #3097D1; font-weight: bold">Question {{$count}} of {{$num_questions}}</div>
                    <div class="panel-body">
                        <h3><strong>Question:</strong></h3><h4>{{$question->label}}</h4>
                        <div class="panel-footer" style="border: solid; border-width: thin">
                        @if(!$question->has_multi)
                            <h3><strong>Answer:</strong></h3><input type='text' id='answer' class='form-control' name='answer_{{$question->id}}' value='{{old("answer_".$question->id)}}' required>
                            @if ($errors->has('answer_'.$question->id))
                                <span class="help-block">
                                <strong style="color: red">{{ $errors->first('answer_'.$question->id) }}</strong>
                                </span>
                            @endif
                        @else
                            <h3><strong>Answer:</strong></h3>
                            <div>
                                <?php $cnt = 1; ?>
                                @foreach($question->multi_choice as $multi)
                                    @if(old("multi_answer_".$question->id) == null && $cnt == 1)
                                        <?php $checked = (true) ? 'checked="checked"' : ''; ?>
                                    @else
                                        <?php $checked = ($multi->label == old("multi_answer_".$question->id)) ? 'checked="checked"' : ''; ?>
                                    @endif
                                        <label class="radio-inline" style="margin-right: 15px"><input type="radio" name="multi_answer_{{$question->id}}" value="{{$multi->label}}" {{$checked}}>{{$multi->label}}</label>
                                    <?php $cnt ++; ?>
                                @endforeach
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $count ++ ?>
    @endforeach
        <input type="hidden" name="survey_id" value="{{$current_survey->id}}">
        <input type="submit"  value="Submit" class="btn btn-primary pull-right">
    </form>

@endsection
