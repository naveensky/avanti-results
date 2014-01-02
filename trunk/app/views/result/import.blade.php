@extends('layouts.common')
@section('content')
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    initComponents();

    //code for adding
    $(document).ready(function () {
        $("#importRecordsForm").validate({
            rules: {
                importRecords: {"required": true, extension: "csv" }

            },
            messages: {

                importRecords: {required: "Please provide a csv file",extension:"Please enter a csv extension"}
            }
        });
        $('#selectAll').click(function () {
            if ($('#isChkd').val() == 'true') {
                $('.deleteRecord').prop('checked', true);
                $('#isChkd').val('false');
            }
            else {
                $('.deleteRecord').prop('checked', false);
                $('#isChkd').val('true');

            }
        });
        $('#bulkDelete').click(function (e) {
            $('#bulkDelete').button('loading');
            var selectedCheckBoxLength = $(".deleteRecord:checked").length;
            if (selectedCheckBoxLength == 0) {
                e.preventDefault();
//                bootbox.alert("You have not select any record to delete");
                $('#bulkDelete').button('reset');
            }
            else if (selectedCheckBoxLength > 0) {
                bootbox.confirm("Are you sure you want to delete entries", function (result) {
                    if (result) {
                        var idsArray = new Array();
                        var selectedCheckBox = $(".deleteRecord:checked");
                        for (var i = 0; i < selectedCheckBoxLength; i++) {
                            idsArray.push(selectedCheckBox[i].value);
                        }
                        var pathname = window.location.pathname;
                        var data = {};


                        data.ids = idsArray;
                        $.ajax({
                            type: "POST",
                            url: "<%URL::to('/result/delete')%>",
                            data: data,
                            success: function (data) {
                                if (data.status) {
                                    window.location = pathname;
                                }
                                else
                                    bootbox.alert("Sorry error occured while deleting entries");
                            },
                            dataType: 'json'
                        });
                    }
                });
                $('#bulkDelete').button('reset');
            }
        });

    })


</script>


<?php $message = Session::get('message'); ?>
<?php $validationClass = AppHtmlHelper::getValidationClass(Session::get('status')) ?>
<?php if (!empty($message)) echo "<div class=\"$validationClass\">$message <button type='button' class='close' data-dismiss='alert'>×</button></div>"; else echo ""; ?>


<div class="row">
    <div class="span12">

        <div class="row">
            <div class="span3">
                <div class="well">
                    <h3>Instructions</h3>

                    <p>Import test results in the database by uploading the csv file containing records. You can
                        <a target="_blank" href="<% URL::to('result/sample-file') %>">download a sample file here</a>.
                    </p>

                    <form name="form" method="post" enctype="multipart/form-data" id="importRecordsForm"
                          action="<% URL::to('result/import') %>">
                        <div class="control-group">
                            <label class="control-label" for="importRecordFile">Import File(csv File)*</label>

                            <div class="controls">
                                <input type="file" name="importRecords" id="importRecords"
                                    >
                            </div>
                            <% $errors->first('importRecords', '<div class="alert-error alert margin-top-10">:message</div>')%>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <input type="submit" class="btn btn-success btn-block" value="Import Records"/>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

            <div class="span9">
                <div class="row">
                    <div class="span3">
                        <h3>Results</h3>
                    </div>
                    <div class="span6">
                        <div class="pull-right">
                            <h3>
                                <input type="hidden" id="isChkd" name="selectAll" value="true"/>
                                <input type="button" class="btn btn-danger" id="bulkDelete"
                                       value="Delete Selected Entries"
                                       data-loading-text="Deleting...."/>

                            </h3>
                        </div>

                    </div>

                </div>


                <?php $message = Input::old('message');?>
                <?php $validationClass = AppHtmlHelper::getValidationClass(Input::old('status'))?>
                <?php if (!empty($message)) echo "<div class=\"$validationClass\">$message <button type='button' class='close' data-dismiss='alert'>×</button></div>"; else echo "";?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Roll Number</th>
                        <th>Date of Birth</th>
                        <th>School</th>
                        <th>Test Date</th>
                        <th>Result</th>
                        <th>Next Steps</th>
                        <th>City</th>
                        <th>@if($results->getTotal()>0)<input type="checkbox" id="selectAll" value="Mark All"/>@endif
                        </th>


                    </tr>
                    </thead>
                    @if($results->getTotal()==0)
                    <tbody>
                    <tr>
                        <td colspan="9" style="text-align: center">
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
                @foreach ($results as $result)
                <tr>
                    <td><%(($results->getCurrentPage() - 1) * Constants::PAGING_COUNT + $count++)%></td>
                    <td><% $result->name %></td>
                    <td><% $result->rollNumber%></td>
                    <td><% $result->dob%></td>
                    <td><% $result->schoolName%></td>
                    <td><% $result->testDate%></td>
                    <td><% Util::getStatus($result->result)%></td>
                    <td><% $result->nextSteps%></td>
                    <td><% $result->city%></td>
                    <td><input type="checkbox" id="<% $result->id %>" value="<% $result->id %>"
                               class="deleteRecord"/>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <?php echo $results->links(); ?>
                @endif
                </table>

            </div>
        </div>


    </div>

</div>
@stop
