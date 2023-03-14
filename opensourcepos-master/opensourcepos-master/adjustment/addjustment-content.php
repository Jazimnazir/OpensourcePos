	<script src="../plugins/export/src/jquery.table2excel.js"></script>
	<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	
	
	<script src="../plugins/datepicker/bootstrap.bundle.min.js"></script>
	<script src="../plugins/datepicker/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="../plugins/datepicker/bootstrap-datepicker.min.css"> 
	<script>
$(document).ready(function(){
$('#barcode').focus();
function filtering(){
	var barcode=$('#barcode').val();
	 if(barcode!='')
	 {
		 
		 $.ajax({
		url:'search-product.php',
		type:'POST',
		data:
		{
			'search':1,
			barcode:barcode,
			
		},
		success:function(data)
		{
			$('.filter').fadeIn();
			$('.filter').html(data);
		}
	});
	return false;
	 }
	 if(barcode=='')
	 {
		 $('.filter').fadeOut();
	 }
	}
	
function additem(){
	var purchasedate = $('#purchasedate').val();
	var details = $('#details').val();
	var amountpaid = $('#amountpaid').val();
	var barcode = $('#barcode').val();
	var reference = $('#reference').val();
	var supplier = $('#supplier').val();
	var formamountpaid = $('#formamountpaid').val();
   	if(barcode.length>=3){
		
		 $.ajax({
			url:'search-item.php',
			type:'POST',
			dataType: 'json', 
			async:false,
			cache:false,
			data:{
				'search':1,
				barcode:barcode,
				details:details,
				purchasedate:purchasedate,
				supplier:supplier,
				reference:reference,
				amountpaid:amountpaid,
				
			},
			complete:function(data)
			{
				 
			},
			success:function(data){
			 
				
				$('#tbladjustment').load('adjustment-table.php');
			 
			  if(data.status==1)
				{ 
				$('#barcode').val("");
				$('#addtotal').val(data.addtotal);
				$('#removetotal').val(data.removetotal);
				 
	 
				}else if(data.status='exist')
				{
					alert('This item is already existing in table adjustment');
					$('#barcode').val('');
				} 
	}//end of success function
			
 
		 }); 
		 return false;
 
	} 
}	

$('.filter').on('click','li',function(){
	var name = $(this).text();
	var code=$(this).attr('data-id');
	$('.filter').fadeOut(); 
	$('#barcode').val(code);
}); 


$('#barcode').on('keyup',function(){
 filtering();
 var barcode =$('#barcode').val();
 $.ajax
 ({
	url:'get-product.php',
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
			 additem();
			
		}
	}
 });
});

// SELECT ADJUSTMENT_TYPE
  $(document).on('change','#adjustment_type',function(e){
	e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var inventoryid=row.find("td:eq(0)").text();//id
	var select = $(this).val();
	var qty=row.find("td:eq(9) input").val();//id
	$.ajax({
		url:'change-adjustment.php',	
		type:'POST',
		dataType:'json',
		data:
		{
			'adjustment':1,
			inventoryid:inventoryid,
			select:select,
			qty:qty
		},
		success:function(data)
		{
			if(data.stock=='excess')
			{
				alert("Can't remove item with large amount");
			}
			
		 	$('#tbladjustment').load('adjustment-table.php');
			$('#addtotal').val(data.addtotal);
			$('#removetotal').val(data.removetotal);
		},
		error:function(data)
		{
			alert(error);
		}
	});
	  
  });

// SELECT CHANGE Qty
  $(document).on('change','#qty',function(e){
	e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var inventoryid=row.find("td:eq(0)").text();//id
    var qty=row.find("td:eq(9) input").val();//id
    var adjustment_type=row.find("td:eq(8) select").val();//id
    var cost=row.find("td:eq(5)").text();//id 
	$.ajax({
		url:'change-qty.php',	
		type:'POST',
		dataType:'json',
		data:
		{
			'change_qty':1,
			inventoryid:inventoryid,
			qty:qty,
			cost:cost,
			adjustment_type:adjustment_type
		},
		success:function(data)
		{
			if(data.stock=='excess')
			{
				alert("Can't remove item with large amount");
			}
		 	$('#tbladjustment').load('adjustment-table.php');
			$('#addtotal').val(data.addtotal);
			$('#removetotal').val(data.removetotal);
			
		},
		error:function(data)
		{
			alert(error);
		}
	});
	  
  });



 
//9. DELETE ITEM FROM PURCHASE
  $(document).on('click','#btn-delete',function(e){
	e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var id=row.find("td:eq(0)").text();//id
	 $.ajax({
		url:'delete-adjustment.php',
		type:'POST',
		dataType:'json',
		data:{
			'delete':1,
			id:id
		},
		success:function(data)
		{ 
		$('#tbladjustment').load('adjustment-table.php');
			$('#addtotal').val(data.addtotal);
			$('#removetotal').val(data.removetotal);
		
		},
		error:function(data)
		{
			alert(data);
		}
	 });
  
  });


//14. SAVE PURCHASE TO INVENTORY
$('#save-adjustment').on('click',function(){
	var reference=$('#reference').val();
	var adjustment_date=$('#adjustment_date').val();
	var details=$('#details').val();
	 
	$.ajax({
	url:'submit-adjustment.php',
	type:'POST',
	data:{
	'submit':1,
	reference:reference,
	adjustment_date:adjustment_date,
	details:details,
	 
	},
	success:function(){
	alert('Successfuly Saved');
	window.location.href="../adjustment-list/adjustmentlist.php";
	},
	error:function(data){
		alert(data);
	}
	});
});
//15. BACK TO LIST CLICK CANCEL
$('#cancel-purchase').on('click',function(){
	window.location.href="purchaselist.php";
});
}); 
</script>
<style>
.filter li: 
{
	padding:2px;
	font-size:14px;
	 
}
.filter li:hover
{
	background-color:#d1d7f1;
	cursor:pointer;
	font-weight:700;
}
</style>
	 <div class="content-wrapper">
	 
										 
		<!-- Content Header (Page header) -->
		<section class="content-header" style="padding:1px;">
		  <div class="container-fluid">
			<div class="row mb-2">
			  
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-left">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item"><a href= "purchaselist.php">Purchase list</a></li>
				  <li class="breadcrumb-item">Add/less item</li>
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
		<h5 style="margin-left:2%; 	">Adjustment item(s)</h5>
	 
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
	 

		  <!-- Messages Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style=" margin:1px;color:rgb(23, 162, 184);border-radius:2px;font-size:20px; ">
			  <i class="fas fa-bars"></i>
			  
			</a>
			<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="text-align:center;">
			  
		   
			 
		   
			  <a href="../adjustment-list/adjustmentlist.php" class="dropdown-item"  ><span class="fas fa-plus-circle"></span>Adjustment List</a>
				  <div class="dropdown-divider"></div>
			  <a href="#" class="dropdown-item " id="exportexcel">Export(CSV)</a>
			</div>
		  </li>
		  
		</ul>
	  </div>
				  </div>
				  <!-- /.card-header -->
				  <div class="card-body">
									<div class="row mb-2"  >
							<div class="col-md-12">
							 <div class="col-sm-4" style="float:left;">
							 
							 <div class="form-group">
							  <p class="m-0">Adjustment Date (Mm-dd-yyyy) <b style="color:coral;">*</b></p>
								<div class="input-group input-group-sm m-0 p-0 date" id="datepicker">
									<input type="text" class="form-control" id="adjustment_date" name="adjustment_date" value="<?php echo date("m-d-Y");?>">
									<span class="input-group-append">
										<span class="input-group-text bg-white">
										<i class="fa fa-calendar"></i>
										</span>
									</span>
								</div>
							 </div>  

							</div>
					
					<div class="col-sm-4" style="float:left;">
								<div class="form-group" >
                     <p class="m-0">Reference (optional)</p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="reference" name="reference" class="form-control float-right">
 
				
					  
					  </div>
                  </div> 

							</div>
									<div class="col-sm-4" style="float:left;">
								<div class="form-group" >
                     <p class="m-0">Details (optional)</p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="details" name="details" class="form-control float-right">
 
				
					  
					  </div>
                  </div> 

							</div>		 
			 	 
							</div>
										
							</div>
									 
									 
				  
				  <div class="form-group" style="padding-top:15px;padding:2px;margin:0px;"> 
					 <div class="input-group input-group-md" >
						    <div class="input-group-append">
						  <button type="submit" class="btn btn-primary">
							<i class="fas fa-barcode"></i>
						  </button>
						</div>
						  <input type="text" id="barcode" name="barcode" class="form-control float-right" style="border-radius:0px 0px 0px 0px;" placeholder="Product code, name">
  <div class="input-group-append">
						  <button type="submit" class="btn btn-primary" id="btn-product">
							<i class="fas fa-plus"></i>
						  </button>
						</div>
						 
				
					  
					  </div>
					  	<div class="col-md-5" style="position:flex;margin-left:35px;">
				 					  <div id="productlist" class="filter">
									 
									  </div>
							
				  
						</div>
			 
					<div id="table-form">	 
					<?php include_once('../database.php');?>
   <table class="table table-bordered table-hover" id="tablepurchase">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
             
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;" width="400">Product (Code-Name)</th>  
                    <th style="border:none;" width="100">Unit</th> 
                    <th  style="border:none;" width="100">Category</th>  
                    <th  style="border:none;" width="150">Cost</th>   	 
                    <th  style="border:none;" width="150">Supplier</th>   	 
                    <th  style="border:none;" width="150">Expiry Date</th>   	 
                    <th  style="border:none;" width="150">Type</th>   	 
                    <th  style="border:none;" width="150">Qty</th>   	 
                    <th  style="border:none;" width="150">Cost</th>   	 
                    <th  style="border:none;" width="150">Subtotal</th>   	 
                    <th align="center" style="border:none;"> <i class="fas fa-times" style="padding-left:10px;"></i></th>
               
                  </thead>
                  <tbody id="tbladjustment"> 
				<?php include('adjustment-table.php');?>
                  </tbody>
				  <tfoot>
					   <tr class="bg-green p-0 m-0"> 
				    <td style="padding:1px;display:none;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td>  		
				    <td style="padding:1px;"></td>  		
				    <td style="padding:1px;"></td>  		
				    <td style="padding:1px;"></td>  		
				    <td style="padding:1px;"></td>  		
				    <td style="padding:1px;"></td> 	
					
					<td style="display:none;">0.00</td>
				    <td style="padding:1px;"></td> 
				    
                  </tr>
				  <tr style="border:none;"> 
				    <td style="display:none;"> </td>
				    <td> </td>
				    <td> </td>
				    <td> </td>
				    <td> </td>    
				    <td> </td>    
				    <td> </td>    
				    <td></td>   
				    <td></td>   
				    <td></td>   
				    <td align="right" border="none">Added Total:</td>   
				    <td id="total_cell">
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="addtotal" name="addtotal" class="form-control" value="<?php echo number_format($addtotal,2,'.','');?>" style="font-size:1rem;"disabled>

					 
					
					  
					  </div>
					</td>

					<td style="display:none;" >0.00</td>					
					<td>--</td>
                  </tr>
			  				  <tr style="border:none;"> 
				    <td style="display:none;"> </td>
				    <td> </td>
				    <td> </td>
				    <td> </td>    
				    <td> </td>    
				    <td> </td>    
				    <td> </td>    
				    <td></td>   
				    <td></td>   
				    <td></td>   
				    <td align="right" border="none">Remove Total:</td>   
				    <td id="total_cell">
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="removetotal" name="removetotal" class="form-control" value="<?php echo number_format($removetotal,2,'.','');?>" style="font-size:1rem;"disabled>

					 
					
					  
					  </div>
					</td>

					<td style="display:none;" >0.00</td>					
					<td>--</td>
                  </tr>
			  
				  </tfoot>
                </table>
					 </div>
				  </div>
				  <!-- /.card-body -->
				</div>
				<!-- /.card -->
				 <div class="card-footer">
               
               <button type="button" id="save-adjustment" name="save-adjustment" class="col-md-2 btn btn-primary btn-save"  id="update-product">Save Adjustment</button>
			  
			  <a type="button" class="btn btn-warning" href="../adjustment-list/adjustmentlist.php">Cancel</a>
            </div>
	  
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->
		  </div>
		  <!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	  </div>
	  </div>
 
	  	  	   <!--MODAL PAGE AMOUNT PAID-->
			<?php include('form-product.php');?>
	  <!--END OF MODAL PAID AMOUNT-->
	  <script type="text/javascript">
	  $(function(){
		 $('#datepicker').datepicker(); 
	  });
	  </script>
	