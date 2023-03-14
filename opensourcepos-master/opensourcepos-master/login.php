<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SSC 2021|Login</title>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
 <script>
 $(document).ready(function(){
	$(document).on('click','#btn-login',function(){
	 var username=$('#username').val();
	 var password=$('#password').val();
	 if(username=="" || password==""){
		 alert('Please fillup an empty field(s)');
	 }else{
		 $.ajax({
			url:'login-controller.php',
			type:'POST',
			dataType:'json',
			data:{
				'login':1,
				username:username,
				password:password,				
			},
			success:function(data){
				if(data.status == 0){
					alert('Incorrect username or password');
				}else{
					window.location.href="Dashboard.php";
				}
			}
			
			
		 });
		 
	 }
	});
 });
 </script>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
     <img src="vote/logo/fcilogov1.png">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
   
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <button class="btn btn-block btn-primary" id="btn-login">
          <i class="fa fa-"></i>Login
        </button>
        
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1" style="display:none;">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
