<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Invoice</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" background="red">
    <p class="login-box-msg" style="color:red;">Username or Password is invalid try again</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Email/User name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div style="padding-left:20px;" class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me <br/>
            </label>

          </div>
        </div>

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat" onclick="signin()">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->



  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
function signin(){
  var user_name = $("#user_name").val();
  var password = $("#password").val();
  $.ajax({
    type:'POST',
    url:'check_user.php',
    data: {user_name:user_name, password:password},
    success:function(responce){
      if(responce=="success"){
        direct_to_dashboard();
      }else{
      document.location="invalid_login.php";

      //  alert("failed to login");
      }
    //  direct_to_dashboard();
    }
  });
}

function direct_to_dashboard(){
  var user_ID = '<?php echo $user_ID;?>';
  $.ajax({
    type:'POST',
    url:'dashboard.php',
    data:{user_ID:user_ID},
    success: function (responce){
      $("body").html(responce);
    }
  });
}
</script>
</body>
</html>
