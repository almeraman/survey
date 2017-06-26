@extends('layouts.app')

@section('survey_heading', 'My Account')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default" style="border-width:medium;">
                    <div class="panel-heading" style="background-color: #3097D1; font-weight: bold">My Balance</div>
                    <div class="panel-body">
                        <h3><strong>Current balance:</strong><span id="balance"> € {{number_format((float)$user->balance, 2, '.', '')}}</span></h3>
                        @if($user->balance > 0)
                            <button type="button" id="balance_btn" data-toggle="modal" data-target="#checkoutModal" class="btn btn-success pull-right">Checkout</button>
                        @else
                            <button type="button" class="btn btn-success pull-right" disabled>Checkout</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="checkoutModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Checkout</h4>
                </div>
                <div class="modal-body">
                    <p>€{{number_format((float)$user->balance, 2, '.', '')}} will be added to the account you have provided.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success pull-right" data-dismiss="modal" onclick="postBalance()">Confirm</button>
                </div>
            </div>

        </div>
    </div>
    <?php $total_earned = 0 ?>
    <h3>Survey History</h3>
    <table class="table table-bordered">
        <thead>
        <th class="col-md-3">Provider</th>
        <th class="col-md-3">Survey Name</th>
        <th class="col-md-2">Submit Date</th>
        <th class="col-md-2">Value</th>
        </thead>
        @foreach($user->surveys as $survey)
            <tr>
                <td>{{$survey->companies->first()->name}}</td>
                <td>{{$survey->title}}</td>
                <td>{{$survey->find($survey->id)->updated_at}}</td>
                <td>{{number_format((float)$survey->value, 2, '.', '')}}</td>
            </tr>
        @endforeach
    </table>
    <h3 class="pull-right" style="margin-right: 5%">Total Earned: € <span id="total_display">{{ number_format((float)$user->total, 2, '.', '') }}</span></h3>
@stop
@section('scripts')
    <script type="text/javascript">

        var total = '{{$user->total}}';
        var current = '{{$user->balance}}';
        var display_total = parseFloat(total) + parseFloat(current);

        function postBalance(){
            $.ajax({
                type: "POST",
                url: "{{route('post-balance')}}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function() {
                    $('#balance').html(' € 0.00');
                    $('#total_display').html((Math.round(display_total * 100) / 100).toFixed(2));
                    $('#balance_btn').attr('disabled', true)
                },
                error: function(){
                    alert("Something went wrong, please try again.");
                }
            });
        }
    </script>
@stop