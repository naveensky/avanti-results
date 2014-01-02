@extends('layouts.common')
@section('content')
<script>
    $(document).ready(function () {
        initComponents();
        $('.updateStatusButton').on('click', function () {
            var status = $(this).data('status');
            var remarks = $(this).data('remarks');
            var rowId = $(this).data('id_row');
            if (!remarks)
                remarks = "";
            if (!rowId)
                rowId = "";
            $('#remarks').val(remarks);
            $('#status').val(status);
            $('#row_id').val(rowId);
            $('#statusMessage').hide().removeClass();
            $('#myModal').modal('show');
        });


    });

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
</script>
<div class="row">
    <div class="span6">
        <h3>Registration List</h3>
    </div>

</div>

<div class="row">
    <div class="span3">
        <form class="well" method="get" action="<% URL::to('register/list') %>">
            <div class="control-group">
                <div class="controls">
                    <label class="control-label" for="name">Name</label>
                    <input name="name" type="text" id="name" value="<% $name %>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="fromDate">From Date</label>

                <div class="controls">
                    <input type="text" class=" date datetime-input no-bottom-margin readonly" id="fromDate"
                           name="fromDate"
                           value="<% $fromDate %>"
                           readonly>
                    <% $errors->first('fromDate', '<div class="alert-error alert margin-top-10">:message</div>')%>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="toDate">To Date</label>

                <div class="controls">
                    <input type="text" class=" date datetime-input no-bottom-margin readonly" id="toDate"
                           name="toDate"
                           value="<% $toDate %>"
                           readonly>
                    <% $errors->first('toDate', '<div class="alert-error alert margin-top-10">:message</div>')%>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label for="status">Status</label>
                    <select name="status" id="statusSearch">
                        <option value="">Choose Status</option>
                        @foreach(Constants::getStatuses() as $row)
                        @if($status==$row)
                        <option selected="selected" value="<% $row %>"><% $row %></option>
                        @else
                        <option value="<% $row %>"><% $row %></option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="control-group">
                <div class="controls">
                    <label class="control-label" for="city">City</label>
                    <input value="<% $city %>" name="city" type="text" id="city">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input name="search" class="btn btn-success btn-block" type="submit" value="Search">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">

                    <input name="download" value="Download" class="btn btn-block" type="submit"
                           id="downloadButton">
                </div>
            </div>
        </form>
    </div>
    <div class="span9">

        <?php $message = Input::old('message');?>
        <?php $validationClass = AppHtmlHelper::getValidationClass(Input::old('status'))?>
        <?php if (!empty($message)) echo "<div class=\"$validationClass\">$message <button type='button' class='close' data-dismiss='alert'>×</button></div>"; else echo "";?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Status</th>
                <th>Registration Date</th>
                <th>&nbsp;</th>

            </tr>
            </thead>
            @if($registrations->getTotal()==0)
            <tbody>
            <tr>
                <td colspan="7" style="text-align: center">
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

        <?php $count = 1;?>
        @foreach ($registrations as $row)
        <tr>
            <td><%(($registrations->getCurrentPage() - 1) * Constants::PAGING_COUNT + $count++)%></td>
            <td><% $row->name%></td>
            <td><% $row->mobile%></td>
            <td><% $row->city%></td>
            <td><% $row->status%></td>
            <td><% $row->registrationDate%></td>
            <td style="text-align: right">
                <button data-status="<% $row->status %>" data-remarks="<% $row->remarks %>" data-id_row="<% $row->id %>"
                        class="btn btn-info updateStatusButton">Update Status
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        <?php echo $registrations->links(); ?>
        @endif
        </table>

    </div>

</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Update Status</h3>
    </div>
    <form method="post" action="<% URL::to('register/update-status') %>">
        <div class="modal-body">

            <input type="hidden" name="id" id="row_id">
            <input type="hidden" name="page" id="ufPage">
            <input type="hidden" name="name" id="ufName">
            <input type="hidden" name="fromDate" id="ufFromDate">
            <input type="hidden" name="toDate" id="ufToDate">
            <input type="hidden" name="city" id="ufCity">
            <input type="hidden" name="status" id="ufStatus">

            <div id="statusMessage" style="display: none" class="">

            </div>
            <div class="control-group">
                <label class="control-label" for="status">Status</label>

                <div class="controls">
                    <select name="status" id="status">
                        @foreach(Constants::getStatuses() as $status)
                        <option value="<% $status %>"><% $status %></option>
                        @endforeach
                    </select>
                </div>

                <div class="controls">
                    <label class="control-label" for="remarks">Comments</label>
                    <textarea name="remarks" id="remarks"></textarea>
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