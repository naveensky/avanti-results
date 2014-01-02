@extends('layouts.common')
@section('content')
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    initComponents();

    //code for adding
    $(document).ready(function () {
        $("#result").validate();
    });


</script>


<?php $message = Session::get('message'); ?>
<?php $validationClass = AppHtmlHelper::getValidationClass(Session::get('status')) ?>
<?php if (!empty($message)) echo "<div class=\"$validationClass\">$message <button type='button' class='close' data-dismiss='alert'>×</button></div>"; else echo ""; ?>

<div class="row">
    <div class="span12">
        <div class="row">
            <div class="span3">
                <h3>Search Your Result</h3>

                <form name="result" method="get" id="result"
                      action="<% URL::to('/') %>">
                    <div class="control-group">
                        <label class="control-label" for="rollNumber">Roll Number*</label>

                        <div class="controls">
                            <input type="text" class="required" name="rollNumber" id="rollNumber"
                                   placeholder="enter your roll number">
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label" for="dob">Date of birth*</label>

                        <div class="controls">

                            <input type="text" class=" date datetime-input no-bottom-margin readonly required" id="dob"
                                   name="dob"
                                   value=""
                                   readonly>

                        </div>


                    </div>
                    <div class="control-group">

                        <div class="controls">
                            <input type="submit" class="btn btn-success" value="Search"/><span style="display: none;"
                                                                                               id="submitImage"><img
                                    src="<% URL::to('img/ajax-loader.gif'); %>"></span>
                        </div>

                    </div>
                </form>
            </div>

            <div class="span9">

                @if(!is_null($result)&&$result!=false)
                <h3>Result</h3>
                <table class="table table-bordered">
                    <thead>
                  
                    </thead>
                    <tbody>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td >Name</td>
                        <td ><%$result->name%></td>
                    </tr>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td >Roll Number</td>
                        <td ><%$result->rollNumber%></td>
                    </tr>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td >Date of Birth</td>
                        <td ><%$result->dob%></td>
                    </tr>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td >School Name</td>
                        <td ><%$result->schoolName%></td>
                    </tr>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td >Test Date</td>
                        <td ><%$result->testDate%></td>
                    </tr>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td>Result</td>
                        <td><%Util::getStatus($result->result);%></td>
                    </tr>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td >City</td>
                        <td ><%$result->city;%></td>
                    </tr>
                    <tr class="<% AppHtmlHelper::getStatusClass($result->result) %>">
                        <td  colspan="2" style="text-align: justify"><%$result->nextSteps;%></td>
                    </tr>
                    </tbody>
                </table>
                @elseif (is_null($result))
                <div class="alert alert-warning">No Result found
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
@stop
