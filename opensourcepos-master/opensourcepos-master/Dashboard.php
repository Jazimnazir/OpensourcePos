<?php
session_start();
include('cpanel-user.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('database.php');?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $_SESSION['usertype']?>| <?php echo $_SESSION['fullname']?></title>
<?php include('headerlink.php');?>
</head>
<style>
.red-border{
	border:1px solid red;
}
.no-margin{
	margin:0px;
}
.no-padding{
	padding:0px;
}
</style>
<body class="sidebar-mini">
  
<div class="wrapper">
  <!-- Navbar -->
<script>
$(document).ready(function(){
  $('#btn-sidebar').trigger('click');
 
});
</script>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
       <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="btn-sidebar"><i class="fas fa-arrow-left"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="pos/index.php" class="nav-link">POS</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="product/productlist.php" class="nav-link">PRODUCT LIST</a>
      </li>
	   <li class="nav-item d-none d-sm-inline-block">
        <a href="category/index.php" class="nav-link">CATEGORY LIST</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="supplier/supplierlist.php" class="nav-link">SUPPLIER LIST</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="purchase/purchaselist.php" class="nav-link">PURCHASE LIST</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="adjustment-list/adjustmentlist.php" class="nav-link">ADJUSTMENT LIST</a>
      </li>
	   <li class="nav-item d-none d-sm-inline-block">
        <a href="stock/index.php" class="nav-link">STOCK LIST</a>
      </li>
	     
	   
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
    
     
		   <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#"><?php echo $_SESSION['fullname'];?></a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
		  <div class="dropdown-divider"></div> 
          <a href="#" class="dropdown-item dropdown-footer" style="text-align:left;">Logout</a> 
          <div class="dropdown-divider"></div> 
          <a href="#" class="dropdown-item dropdown-footer" style="text-align:left;">Change password</a> 
        </div>
      </li>
 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-load">
  <?php include('Dashboard-content.php');?>
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
 
<!-- Page specific script -->
 
</body>
</html>
<script src="plugins/chart.js/Chart.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
