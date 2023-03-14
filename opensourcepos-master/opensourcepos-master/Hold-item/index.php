<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS| Sale</title>

<?php include('../headerlink-child.php');?>
</head>
 
<body class="hold-transition layout-top-nav layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light p-1 m-0"  style="">
  	   <a href="../Dashboard.php"class="btn"  style="border:1px solid rgb(219, 219, 219);background-position:center;width:50px;height:50px;font-size:0.7rem;background-image:url('../icons/dashboard2.png');background-repeat:no-repeat;"></a>
	   <a class="btn" id="creditlist" style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/card2.png');background-repeat:no-repeat;"> </a>
	   <a class="btn"   style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/counter3.png');background-repeat:no-repeat;"> </a>
	   <a class="btn"   style="border:1px solid rgb(219, 219, 219);width:50px;height:50px;font-size:1rem;background-position:center;background-image:url('../icons/calculator.png');background-repeat:no-repeat;"> </a>
	  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"  >
  <!-- Navbar Search -->
       
  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> 
       <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          User account
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
 <?php include('sale-content.php');?>
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
