@extends('layouts.common')
@section('content')
<script>
    $(document).ready(function () {
        $("#loginForm").validate({
            rules: {
                password: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                password: {
                    required: "Please provide a password"
                },
                email: {email: "Please enter a valid email address", required: "Please enter your email id"}
            }
        });
    });
</script>
<div class="row">
    <div class="span4 offset3 well">
        <form name="form" method="post" action="<% URL::to('user/login') %>" id="loginForm">
            <legend><i class="icon-lock"></i> Sign In</legend>
            <?php $sessionMessage = Session::get('message'); if (!empty($sessionMessage)) $message = $sessionMessage; else $message = Input::old('message');?>
            <?php $sessionStatus = Session::get('status'); if (!empty($sessionStatus)) $status = $sessionStatus; else $status = Input::old('status');$validationClass = AppHtmlHelper::getValidationClass($status)?>
            <?php if (!empty($message)) echo "<div class=\"$validationClass\">$message <button type='button' class='close' data-dismiss='alert'>×</button></div>"; else echo "";?>
            <div class="control-group">
                <label for="email">Email</label>
                <input tabindex="1" class="input-block-level" name="email" id="email" placeholder="Enter your email id"
                       type="email">
                <% $errors->first('email', '<div class="alert-error alert margin-top-10">:message</div>')%>
            </div>

            <div class="control-group">
                <label for="password">Password</label>
                <input tabindex="2" type="password" name="password" class="input-block-level" id="password"
                       placeholder="Enter your password">
                <% $errors->first('password', '<div class="alert-error alert margin-top-10">:message</div>')%>
            </div>

            <div class="control-group">
                <input tabindex="3" class="btn btn-block btn-info" type="submit" value="Log in">
            </div>
        </form>
    </div>
</div>
@stop