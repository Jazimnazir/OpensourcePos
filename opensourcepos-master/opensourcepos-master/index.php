 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JANN MART|Login</title>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
 <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
	     var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
</script>
 <script>
 $(document).ready(function(){
 
 $('#username').focus();
	$(document).on('click','#btn-login',function(){
	 var username=$('#username').val();
	 var password=$('#password').val();
	 if(username=="" || password==""){
		   Toast.fire({icon: 'error',
		   title: ' Fill-up an empty field(s)'});
		   $('#username').focus();
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
					 Toast.fire({icon: 'error',title:'Error, Incorrect username or password'});
					$('#username').val('');
					$('#password').val('');
					$('#username').focus();
					
				}else{
					$('#btn-login').text('Loading...');
					window.location.href="Dashboard.php";
				}
			}
			
			
		 });
		 
	 }
	});
	
$('#password').keypress(function(event)
{
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode=='13')
	{
		$('#btn-login').trigger('click');
	}
});
$('#username').keypress(function(event)
{
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode=='13')
	{
		$('#btn-login').trigger('click');
	}
});


//$('#password').keypress(function(event)
//{
//	var keycode = (event.keyCode ? event.keyCode : event.which);
//	if(keycode=='13')
//	{
//		alert('enter');
//	}
//});


 });
 </script>
 <style>
 .loader
 {
	 position:fixed;
	 top:0;
	 left:0;
	 background:lightgrey;
	 height:100%;
	 width:100%;
	 display:flex;
	 justify-content:center;
	 align-items:center;
 }
 .disappear
 {
	 animation: vanish 5s forwards;
 }
 @keyframes vanish
 {
	 100%
	 {
		 opacity:0;
		 visibility:hidden;
	 }
 }
 </style>
<body class="hold-transition login-page">
 
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
  
    <div class="card-header text-center">
     <img src="icons/login-logo3.png" style="width:120px;">
    </div>
    <div class="card-body">
	 
      <p class="login-box-msg">Sign in to start your session</p>

      <form>
        <div class="input-group mb-3">
          <input type="text" class="form-control" title="Type your username" id="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" title="Type your password" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
   
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <button class="btn btn-block btn-primary" id="btn-login">
        Login  
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
<!-- 
  <div class="loader">
<img src="plugins/loading/android-load.gif">
</div>
-->
</html>
	<script>
	//var loader = document.querySelector(".loader");
//	window.addEventListener("load", vanish);
//	function vanish()
	//{
	//	loader.classList.add("disappear");
//		 
	}
	</script>
