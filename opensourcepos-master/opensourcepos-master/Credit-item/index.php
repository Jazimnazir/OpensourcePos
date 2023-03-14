<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS| <?php echo $_SESSION['fullname']?></title>

<?php include('../headerlink-child.php');?>
</head>
 <style>
#tblcustomer tr td:
{
	padding:1px;
}
#tblcustomer tr:hover
{
	background-color:#d1d7f1;
	cursor:pointer; 
}
</style>
<body class="hold-transition layout-top-nav layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light p-1 m-0"  style="background-color:rgb(61, 61, 66);height:40px;">
  	   <a href="../Dashboard.php"class="btn"  style="border:1px solid rgb(219, 219, 219);background-position:center;width:50px;height:50px;font-size:0.7rem;background-image:url('../icons/dashboard2.png');background-repeat:no-repeat;"></a>
	    <a class="btn" id="pos"  style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/counter3.png');background-repeat:no-repeat;background-color:rgb(240, 237, 242);height:40px;border-radius:1px;"><span class="badge bg-success" style="opacity:0.8;"><i class="fas fa-check"></i></span></a>
	   <a class="btn" id="showholdlist"  style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/holditem6.png');background-repeat:no-repeat;"> </a>
		  <a class="btn" id="creditlist" style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/cartplus.png');background-repeat:no-repeat;"> </a>
		  <a class="btn" id="returnitem" style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/cartminus.png');background-repeat:no-repeat;"> </a>
		  <a class="btn" id="creditlist" style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/card2.png');background-repeat:no-repeat;"> </a>
		  <a class="btn" id="salelist" style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/card2.png');background-repeat:no-repeat;"> </a>
		  <a class="btn" id="closeregister" style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/card2.png');background-repeat:no-repeat;"> </a>
	 
	  <a class="btn"   style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/calculator.png');background-repeat:no-repeat;"> </a>
     <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"  style="color:white;">
 
       <li class="nav-item">
        <a class="nav-link"  style="color:white;">
          Point of Sale
        </a>
      </li>
	       
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"  >
  <!-- Navbar Search -->
       
  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button"  style="color:rgb(214, 214, 214);">
          <i class="fas fa-expand-arrows-alt"></i> Zoom-in/out
        </a>
      </li> 
 
	  	         <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" style="color:rgb(214, 214, 214);color:white;">
          <span class="fas fa-user"></span>  Welcome! <?php echo $_SESSION['fullname']?> - <?php echo $_SESSION['usertype']?>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" style="color:rgb(214, 214, 214);">
          <span class="fas fa-arrow-right"></span> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
      <!-- Sidebar Menu -->
   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header p-0 m-1">
		
    </section>

    <!-- Main content -->
 <?php include('return-content.php');?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('footer.php');?>
  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 
</body>
</html>
