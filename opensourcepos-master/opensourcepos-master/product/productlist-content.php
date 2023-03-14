	    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
	
	
	
	 <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>

	<script src="../plugins/export/src/jquery.table2excel.js"></script>
	<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<script>
	var txtupdate='Successfuly Updated product details, Thank you!';
	var txtsave='Successfuly Saved Product, Thank you!';
	var txtdelete='Successfuly Deleted Product details!';
	var emptyinpt='Please check your input fields, Fill-up';
	     var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 9000
    });
</script>

	<script>
$(document).keydown(function(e){
	if(e.shiftKey && e.keyCode == 65)
	{
		$('#addproduct').trigger('click');
		
	}

});

$(document).ready(function(){
 
$('.modal').on('shown.bs.modal', function() {
		$('#productcode').focus();
});	
$('.modal-update').on('shown.bs.modal', function() {
		$('#edit-productcode').focus();
});	
$('#productcode').on('change',function(){
	var barcode = $(this).val();
	$.ajax({
		url:'fetch-item.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'search':1,
			barcode:barcode
			
		},
		success:function(data)
		{
			if(data.status==1)
			{
					
			$('#legend').text('Unavailable');
			$('#legend').show();
			}else
			{
			$('#legend').text('none');
			$('#legend').hide();
			}
		},
		error:function(error)
		{
			alert(error);
		}
	});
});
  //save new PRODUCT to database
 $("#productform").on('submit', function(e){
	 e.preventDefault();
		  	 
	  if($('#productcode').val()=='' || $('#productname').val()=='' || $('#category').val()=='-Select-'|| $('#legend').text=='Unavailable')
	  {
		  alert('please check your input fields	');
	  }else
	  {
		  $.ajax({
            type: 'POST',
            url: 'productlist-controller.php?save=1',
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
			 
			},
            success: function(){  
			window.location.href="productlist.php";  
            }
			
				 
        });
		
	  }
			 
 });
//update candidate to database
 $("#updateform").on('submit', function(e){
      e.preventDefault();
     
       
    $.ajax({
            type: 'POST',
            url: 'productlist-controller.php?update=1',
            data: new FormData(this), 
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false, 
            beforeSend:function(){
				$('.btn-update').val('Loading...');
			}, 
			complete: function(){ 
			window.location.href="productlist.php"; 
			 
			},
            success: function(){  
				 
			$('.modal-update').hide();
			$('.modal').hide();
			$('.fade').hide();
					 
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
 //click update button
  $(".table tbody").on('click', '#click-edit', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table
    var id=row.find("td:eq(0)").text();
    var supplier = row.find("td:eq(3)").text();
	var code = row.find("td:eq(3)").text();
	var name = row.find("td:eq(4)").text();
	var secondname = row.find("td:eq(5)").text();
	var category = row.find("td:eq(6)").text();
	var unit = row.find("td:eq(7)").text();
	var cost = row.find("td:eq(8)").text();
	var price = row.find("td:eq(9)").text();
	var alertqty = row.find("td:eq(11)").text();
	
	$('#productid').val(id); 
	$('#edit-supplier').val(supplier); 
	$('#edit-productcode').val(code);
	$('#edit-productname').val(name);
	$('#edit-secondname').val(secondname);
	$('#edit-category').val(category);
	$('#edit-unit').val(unit);
	$('#edit-cost').val(cost);
	$('#edit-price').val(price);
	$('#edit-alertqty').val(alertqty);
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
  $(document).on('click','#btn-delete',function(e){
    
       e.stopImmediatePropagation();
  var id=$("#deleteid").val();
  $.ajax({
    type:'POST',
    url:'productlist-controller.php',
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
			 
					window.location.href="productlist.php"; 
    },
  });
  return false;
  });
$('#search_product').on('keyup',function(){
	var search = $(this).val();
 $('#tblproduct').load('search-product.php',{search:search});
});
$('#generate_code').on('click',function(){
	$.ajax({
		url:'submit-generate.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'generate':1,
		},
		success:function(data)
		{
			$('#productcode').val(data.generate);
			$('#productcode').trigger('keyup');
			$('#productcode').focus();
		},
		error:function(error)
		{
			alert(error);
		}
	});
});
});
</script>
	 <div class="content-wrapper"  >
	 <?php
	 if($_SESSION['label']=='1')
	 {
		 echo "<script>   Toast.fire({
        icon: 'success',
        title: txtsave
      });</script>";
	  $_SESSION['label']='0';
	 }
	 if($_SESSION['label']=='2')
	 {
		 echo "<script>   Toast.fire({
        icon: 'success',
        title: txtupdate
      });</script>";
		$_SESSION['label']='0';
	 }
	 	 if($_SESSION['label']=='3')
	 {
		 echo "<script>   Toast.fire({
        icon: 'info',
        title: txtdelete
      });</script>";
		$_SESSION['label']='0';
	 }
	 
	 ?>
										 
		<!-- Content Header (Page header) -->
		<section class="content-header" style="padding:1px;">
		  <div class="container-fluid">
			<div class="row mb-2">
			  
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-left">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Product list</li>
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
		<h5 style="margin-left:2%; 	">Product Management </h5>
	 
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
	 

		  <!-- Messages Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style=" margin:1px;color:rgb(23, 162, 184);border-radius:2px;font-size:20px; ">
			  <i class="fas fa-bars"></i>
			  
			</a>
			<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="text-align:center;">
			  
		   
			 
		   
			  <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-lg" id="addproduct"><span class="fas fa-plus-circle"></span> Add Product</a>
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
						   
						  <input type="search" id ="search_product" name="search_product" class="form-control float-right" placeholder="Search product code, name here">

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						  </button>
						</div>
				
					  
					  </div>
					</div>
							</div>
										
							</div>
					 <?php include('tableproduct.php');?>
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
 <?php include('addnewproduct.php');?>
			<?php include('deleteproduct.php');?>
			 
 <?php include('updateproduct.php');?>
	   
	<script>
	$(function () {
	  bsCustomFileInput.init();
	});
	</script>
