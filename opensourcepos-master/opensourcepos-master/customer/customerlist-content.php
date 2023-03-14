	<script src="../plugins/export/src/jquery.table2excel.js"></script>
	<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<script>
$(document).ready(function(){ 
//1.) SUBMIT TO DATABASE NEW SUPPLIR
 $("#supplierform").on('submit', function(e){
	 		e.preventDefault();
		  	 
	  $.ajax({
            type: 'POST',
            url: 'customerlist-controller.php?save=1',
            data: new FormData(this), 
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
			beforeSend:function(){
				$('.btn-save').val('Loading...');
			}, 
			complete: function(){ 
			
			//$('.modal').hide();
			//$('.fade').hide();
			window.location.href="customerlist.php"; 
			},
            success: function(){  
			
			//	alert('Successfuly saved'); 
			  
            }
			
				 
        });
		 
			 
 });
 //2.) UPDATE TO DATABASE
 $("#updateform").on('submit', function(e){
      e.preventDefault();
     
       
    $.ajax({
            type: 'POST',
            url: 'customerlist-controller.php?update=1',
            data: new FormData(this), 
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false, 
            beforeSend:function(){
				$('.btn-update').val('Loading...');
			}, 
			complete: function(){ 
			
				alert('Successfuly updated'); 
			$('.modal-update').hide();
			$('.modal').hide();
			$('.fade').hide();
				window.location.href="customerlist.php"; 
			},
            success: function(){  
			 
			  
            }
         
        });
 });
 //3.) DELETE FROM DATABASE
   $(document).on('click','#btn-delete',function(e){
    
       e.stopImmediatePropagation();
  var id=$("#deleteid").val();
  $.ajax({
    type:'POST',
    url:'customerlist-controller.php',
    dataType:'html',
    async:false,
    cache:false,
    data:{
      'delete':1,
      id:id,
    },
	beforeSend:function(){
		$('#btn-delete').text('Loading...');
	},
    success: function(data){
     
			$('.modal-delete').hide();
			$('.modal').hide();
			$('.fade').hide();
			 
					window.location.href="customerlist.php"; 
    },
  });
  return false;
  });
  $(".table tbody").on('dblclick', '#btn-status', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table
      var id=row.find("td:eq(0)").text();
      var status=row.find("td:eq(6) span").text();
	 
   $.ajax({
	 url:'customerlist-controller.php',
	 type:'POST',
	 data:{
		 'change_status':1,
		 id:id,
		 status:status
	 },
	 success:function()
	 {
		 
	 	window.location.href="customerlist.php"; 
	 },
	 error:function(data)
	 {
		 alert(data);
	 }
   });
         


      
}); 

 //on change course
 $(document).on('change','#combo-course', function(e){
   e.stopImmediatePropagation();
   var course = $('#combo-course').val();
   var position = $('#combo-position').val();
   $.ajax({
           type:'POST',
           url:'candidate-controller.php',
           data:{
            'searching':1,
            course:course,
            position:position,
           },  
           success: function(data){
           $('#tblcandidate').html(data);
           }
         }); 
return false;
 }); 
 
 //click update button
  $(".table tbody").on('click', '#click-edit', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table
    var id=row.find("td:eq(0)").text();
    var name = row.find("td:eq(2)").text(); 
    var number = row.find("td:eq(3)").text(); 
    var address = row.find("td:eq(4)").text(); 
    var gender = row.find("td:eq(5)").text(); 
	
	$('#customerid').val(id);  
	$('#edit-name').val(name);  
	$('#edit-address').val(address);  
	$('#edit-gender').val(gender);  
	$('#edit-number').val(number);  
    $('.modal-update').modal("show");
 


      
});
 //click delete button
  $(".table tbody").on('click', '#click-delete', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table
      var id=row.find("td:eq(0)").text();
      
       $('#deleteid').val(id);
        $('.modal-delete').modal("show");
         


      
});  
 

});
</script>
	 <div class="content-wrapper"  >
	 
										 
		<!-- Content Header (Page header) -->
		<section class="content-header" style="padding:1px;">
		  <div class="container-fluid">
			<div class="row mb-2">
			  
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-left">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Customer list</li>
				</ol>
			  </div>
			</div>
		  </div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
	 
		  <div class="container-fluid" style="margin-left:0px;">
			<div class="row" >
			  <div class="col-12" style="margin:1px;padding:1px;">
				<div class="card">
				  <div class="card-header" style="padding:0px;">

	 
		<div class="navbar navbar-expand navbar-white navbar-light" style="padding:1px;margin:0px;">
		<h5 style="margin-left:2%; 	">Customer Management </h5>
	 
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
	 

		  <!-- Messages Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style=" margin:1px;color:rgb(23, 162, 184);border-radius:2px;font-size:20px; ">
			  <i class="fas fa-bars"></i>
			  
			</a>
			<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="text-align:center;">
			  
		   
			 
		   
			  <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-lg"><span class="fas fa-plus-circle"></span> Add customer</a>
				  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item " id="exportexcel">Export(CSV)</a>
			</div>
		  </li>
		  
		</ul>
	  </div>
				  </div>
				  <!-- /.card-header -->
				  <div class="card-body">
								<div class="row mb-2">
							<div class="col-sm-10">
						 
					 <div class="card-tools float-left" style="margin-left:1.0rem;">
					  <div class="input-group input-group-sm" style="width:100%;padding-top:0.5rem;">
						   
						  <input type="text" name="table_search" class="form-control float-right" placeholder="Search here...">

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						  </button>
						</div>
				
					  
					  </div>
					</div>
							</div>
										
							</div>
					 <?php include('table-customer.php');?>
				  </div>
				  <!-- /.card-body -->
				</div>
				<!-- /.card -->

	  
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->
		  </div>
		  <!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	  </div>
 <?php include('form-addcustomer.php');?>
			<?php include('deletecustomer.php');?>
			 
 <?php include('form-updatecustomer.php');?>
	   
	<script>
	$(function () {
	  bsCustomFileInput.init();
	});
	</script>
