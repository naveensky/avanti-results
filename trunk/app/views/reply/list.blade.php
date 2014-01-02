@extends('layouts.common')
@section('content')
<script>
    $(document).ready(function () {
        initComponents();
        $('.updateStatusButton').on('click', function () {
            var textMessage = $(this).data('text_message');
            var rowId = $(this).data('id_row');


            $('#row_id').val(rowId);
            $('#textMessage').val(textMessage);
            $('#myModal').modal('show');
        });


    });

</script>
<div class="row">
    <div class="span6">
        <h3>Reply List</h3>
    </div>

</div>

<div class="row">

    <div class="span12">

        <?php $message = Input::old('message');?>
        <?php $validationClass = AppHtmlHelper::getValidationClass(Input::old('status'))?>
        <?php if (!empty($message)) echo "<div class=\"$validationClass\">$message <button type='button' class='close' data-dismiss='alert'>×</button></div>"; else echo "";?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Message</th>
                <th style="text-align: center">Edit</th>
            </tr>
            </thead>
            @if($replies->isEmpty())
            <tbody>
            <tr>
                <td colspan="4" style="text-align: center">
                    <br/>
                    <strong>
                        No Data Found
                    </strong>
                    <br/>
                    <br/>
                </td>
            </tr>
            </tbody>
        </table>
        @else
        <tbody>


        @foreach ($replies as $key=>$row)
        <tr>
            <td><%($key + 1)%></td>
            <td><% Constants::getReplyType($row->code)%></td>
            <td style="width: 80%"><% $row->replyText%></td>

            <td style="text-align: center">
                <button data-text_message="<% $row->replyText%>"  data-id_row="<% $row->id %>"
                        class="btn btn-info updateStatusButton"><i class="icon icon-edit"></i>
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>

        @endif

    </div>

</div>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Reply Message</h3>
    </div>
    <form method="post" action="<% URL::to('reply/edit') %>">
        <div class="modal-body">

            <input type="hidden" name="id" id="row_id">
            <div class="control-group">

                <div class="controls">
                    <label class="control-label" for="textMessage">Reply Message</label>
                    <textarea style="width: 98%" rows="6" name="textMessage" id="textMessage"></textarea>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button id="updateStatus" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>
@stop