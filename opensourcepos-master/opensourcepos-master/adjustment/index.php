<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../database.php');?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cashier | Hamja jakilan</title>
<?php include('../headerlink-child.php');?>
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
 <?php include('../topnavbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include('../sidebar-child.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-load">
  <?php include('addjustment-content.php');?>
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
