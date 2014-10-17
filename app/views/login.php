<html>
<head>


</head>
<body>
 <div id="loginfrm">
        {{Form::open(array("","id"=>"frm"))}}
        <!-- <form id="frm"></form> -->
        <label id="username-label">Username</label>
        <input type="text" name="username" id="username">
        <label id="password-label">Password</label>
        {{Form::password('password',array("class"=>"frmControl","id"=>"password"))}}
        {{Form::submit('Create User')}}
        </form>
    </div>
</body>
</html>
