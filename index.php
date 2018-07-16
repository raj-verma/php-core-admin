<?php
@ob_start();
@session_start();
include 'includes/config.php'; 
if(isset($_SESSION["adminid"]))
{
	header("location:dashboard.php");
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pixheight | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Pix</b>Height
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input name="txtuname" required="true" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" required="true" name="txtpass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <button type="submit" name="btnlogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
	<?php

					if(isset($_POST["btnlogin"]))
					{
					
					
					$uname=trim(mysqli_real_escape_string($link,$_POST["txtuname"]));
					$upass=trim(mysqli_real_escape_string($link,$_POST["txtpass"]));
					$que = 	"select * from tbl_adminlogin where uname='$uname' and pass='$upass'";
					$result=mysqli_query($link,$que);
					if(mysqli_num_rows($result)>0)
					{
                        $_SESSION["userid"]=1;
                        $_SESSION["adminid"]=1;
						$_SESSION["name"]='Super Admin';
						header("location:dashboard.php");
						exit;
						
					}
					else
					{
					?>
					<p class="bg-danger text-center" style="padding:5px; color:#EC170F;"><strong>Invalid username or password</strong></p>
					<?php
					exit;
					}
					
				   	
					
				}
				?>	
                        
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>