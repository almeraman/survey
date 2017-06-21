@extends('layouts.app')

@section('survey_heading', $current_survey->title)

@section('content')

    <?php $count = 1 ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Question <span id="q_num">1</span> of {{$num_questions}}</div>
                    <div class="panel-body">
                        <div id="question_view"></div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary pull-right" onclick="saveAnswer({{$current_survey->questions->find($count)->id}})">Next</button>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">

    var num_questions = '{{$num_questions}}';

    $(function() {

        var question;
        question = "<h3>Question:</h3><p>{{$current_survey->questions->find($count)->label}}</p>" +
                   "<h3>Answer:</h3><input type='text' id='answer' class='form-control' name='answer' required>";

        $('#question_view').append(question);
    });

    function saveAnswer(id){
        var answer = $('#answer').val();
        var count = '{{$count}}';

        $.ajax({
            type: "POST",
            url: "{{route('answer')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "answer": answer,
                "question_id": id,
                "survey_id": "{{$current_survey->id}}"
            },
            success: function(data) {
                if(count <= num_questions){
                    nextQuestion();
                }
                <?php $count ++; ?>
            },
            error: function(data){
                alert("fail");
            }
        });
    }

    function nextQuestion(){
        var curr_count = '{{$count}}';
        $('#q_num').html(curr_count);
        $('#question_view').html('');
        var question;
        question = "<h3>Question:</h3><p>{{$current_survey->questions->find($count)->label}}</p>" +
        "<h3>Answer:</h3><input type='text' id='answer' class='form-control' name='answer' required>";

        $('#question_view').append(question);
    }

</script>
@stop