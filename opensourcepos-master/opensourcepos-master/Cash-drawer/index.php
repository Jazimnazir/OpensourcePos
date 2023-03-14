<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
	
	
	
	 <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
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

#tblsoldcustomer tr td:
{
	padding:1px;
}
#tblsoldcustomer tr:hover
{
	background-color:#d1d7f1;
	cursor:pointer; 
}
#btn-dashboard
{
	border:1px solid rgb(219, 219, 219);
	background-position:center;
	width:70px;
	background-color:#37799c;
	height:60px;
	font-size:0.7rem;
	background-image:url('../icons/dashboard3.png');
	background-repeat:no-repeat;
	border-radius:0px;border:0px;
	margin-right:2px;
}
#showholdlist
{
	border:1px solid rgb(219, 219, 219);
	background-position:center;
	width:70px;
	background-color:#fe9a3c;
	height:60px;
	font-size:0.7rem;
	background-image:url('../icons/hold-item12.png');
	background-repeat:no-repeat;
	border-radius:0px;border:0px;
	margin-right:2px;
}
#creditlist
{
	border:1px solid rgb(219, 219, 219);
	background-position:center;
	width:70px;
	background-color:#8d47c4;
	height:60px;
	font-size:0.7rem;
	background-image:url('../icons/credit2.png');
	background-repeat:no-repeat;
	border-radius:0px;
	border:0px;
	margin-right:2px;
}
#returnitem
{
	border:1px solid rgb(219, 219, 219);
	background-position:center;
	width:70px;
	background-color:#fe9a3c;
	height:60px;
	font-size:0.7rem;
	background-image:url('../icons/return5.png');
	background-repeat:no-repeat;
	border-radius:0px;
	border:0px;
	margin-right:2px;
}
#salelist
{
	border:1px solid rgb(219, 219, 219);
	background-position:center;
	width:70px;
	background-color:#319517;
	height:60px;
	font-size:0.7rem;
	background-image:url('../icons/sale.png');
	background-repeat:no-repeat;
	border-radius:0px;
	border:0px;
	margin-right:2px;
}
#closeregister
{
    border:1px solid rgb(219, 219, 219);
	background-position:center;
	width:70px;
	background-color:#8d47c4;
	height:60px;
	font-size:0.7rem;
	background-image:url('../icons/close2.png');
	background-repeat:no-repeat;
	border-radius:0px;
	border:0px;
	margin-right:2px;
}
</style>
<body class="hold-transition layout-top-nav layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light p-1 m-0"  style="background-color:rgb(61, 61, 66);height:61px;">
  	   <button class="btn"  id="btn-dashboard"><span style="float:left;color:white;font-size:0.9rem;margin:0px;margin-top:30px;margin-right:10px;">HOME</span></button> 
  	   <button class="btn" id="showholdlist"><span style="float:left;color:white;font-size:0.9rem;margin:0px;margin-top:30px;margin-right:10px;">HOLD</span></button> 
  	   <button class="btn" id="returnitem"  ><span style="float:left;color:white;font-size:0.9rem;margin:0px;margin-top:30px;margin-right:10px;">RETURN</span></button> 
  	   <button class="btn" id="creditlist"><span style="float:left;color:white;font-size:0.9rem;margin:0px;margin-top:30px;margin-right:10px;">CREDIT</span></button> 
  	   <button class="btn"  id="salelist"><span style="float:left;color:white;font-size:0.9rem;margin:0px;margin-top:30px;margin-right:10px;">SALES</span></button> 
	   <button class="btn"  style="border:1px solid rgb(219, 219, 219);background-position:center;width:70px;background-color:#319517;height:60px;font-size:0.7rem;background-image:url('../icons/calculator2.png');background-repeat:no-repeat;border-radius:0px;border:0px;margin-right:2px;"><span style="float:left;color:white;font-size:0.9rem;margin:0px;margin-top:30px;margin-right:10px;">CALC</span></button> 
	
	  <button class="btn" id="closeregister"><span style="float:left;color:white;font-size:0.9rem;margin:0px;margin-top:30px;margin-right:10px;">CLOSE</span></button> 
     
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
