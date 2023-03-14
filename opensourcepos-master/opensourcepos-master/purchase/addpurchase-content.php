	<script src="../plugins/export/src/jquery.table2excel.js"></script>
	<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	
	
	<script src="../plugins/datepicker/bootstrap.bundle.min.js"></script>
	<script src="../plugins/datepicker/bootstrap-datepicker.min.js"></script>
	<script src="../plugins/autocomplete/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="../plugins/datepicker/bootstrap-datepicker.min.css"> 
	<link rel="stylesheet" href="../plugins/autocomplete/jquery-ui.min.css"> 
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
			 
				
				$('#tblpurchase').load('addpurchase-table.php');
			 
			  if(data.status==1)
				{ 
					$('#barcode').val("");  
				 $('#total').val(data.total.toFixed(2));
				 
	var total = 0;
	var discount = 0;
	var grandtotal = 0;
	var amountpaid = 0;
	var change_or_balance = 0;
	var grandtotal_ans = 0; 
	total = $('#total').val();
	discount = $('#discount').val();
	grandtotal = $('#grandtotal').val();
	amountpaid = $('#cashamountpaid').val();
	grandtotal_ans = total - discount;
	change_or_balance = grandtotal_ans - amountpaid;
	$('#grandtotal').val(grandtotal_ans.toFixed(2));
	if(change_or_balance < 0)
	{
		
	$('#balance').val(0.00);
		
	}else
	{
	$('#balance').val(change_or_balance.toFixed(2));
	}
	}else{
				
	
	
	
		}//end of else function for not found item
	
	}//end of success function
			
 
		 }); 
		 return false;
 
	} 
}	


 

$('#barcode').on('keyup',function(e){
 if(!(e.keyCode == 38 || e.keyCode == 40))
	{
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
	}

});
 	 	 
//2. EDIT CLICK BUTTON
  $(".table tbody").on('click', '#btn-edit', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table
    var id=row.find("td:eq(0)").text(); 
    var qty=row.find("td:eq(7) input").val(); 
	$.ajax({
		url:'fetching-product.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'fetching':1,
			id:id
		},
		complete:function()
		{
			$('.modal-editproduuct').modal("show");
		},
		success:function(data)
		{ 
			var code = data.code;
			var name = data.name;
			var cost = data.cost;
			var price = data.price;
			var expiry = data.expiry;
			var unit = data.unit;
			var category = data.category;
			$('#id').val(id);
			$('#stock').val(qty);
			$('#edit-productcode').val(code);
			$('#edit-productname').val(name);
			$('#edit-cost').val(cost);
			$('#edit-price').val(price);
			$('#edit-expirydate').val(expiry);
			$('#edit-unit').val(unit);
			$('#edit-category').val(category);
		},
		error:function(data)
		{
			alert(data);
		}
	});


      
});
//3. UPDATE PRODUCT DETAILS
$('#update-product').on('click',function(e){
	e.preventDefault();     
	e.stopImmediatePropagation();
    var id = $('#id').val();
	var qty = $('#stock').val();
    var code = $('#edit-productcode').val();
	var name = $('#edit-productname').val();
	var cost = $('#edit-cost').val();
	var price = $('#edit-price').val();
	var expirydate = $('#edit-expirydate').val();
	 $.ajax({
		url:'update-product.php',
		type:'POST',
		dataType:'json',
		async:false,
		cache:false,
		data:
		{
			'updating':1,
			id:id,
			qty:qty,
			code:code,
			name:name,
			cost:cost,
			price:price,
			expirydate:expirydate
		},
		complete:function()
		{
			console.log('completed');
		},
		success:function(data)
		{
		$('#tblpurchase').load('addpurchase-table.php');
		$('#total').val(data.total.toFixed(2));
		 
		var total = 0;
		var discount = 0;
		var grandtotal = 0;
		var amountpaid = 0;
		var change_or_balance = 0;
		var grandtotal_ans = 0; 
		total = $('#total').val();
		discount = $('#discount').val();
		grandtotal = $('#grandtotal').val();
		amountpaid = $('#cashamountpaid').val();
		grandtotal_ans = total - discount;
		change_or_balance = grandtotal_ans - amountpaid;
		$('#grandtotal').val(grandtotal_ans.toFixed(2));
	if(change_or_balance < 0)
	{
		
	$('#balance').val(0.00);
		
	}else
	{
	$('#balance').val(change_or_balance.toFixed(2));
	}
				 
			
		},
		error:function(data)
		{
			alert(data);
		}
	 });
	 $('#cancel').trigger("click");
});
//4. CLICK DISCOUNT BUTTON
  $(".table tfoot").on('click', '#btn-discount', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table
    var id=row.find("td:eq(0)").text();
    var name=row.find("td:eq(2) input").val();
	   $('.modal-discount').modal("show");


      
});
//5. CLICK AMOUNT PAID
  $(".table tfoot").on('click', '#btn-amountpaid', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table
    var id=row.find("td:eq(0)").text();
    var name=row.find("td:eq(2) input").val();
	   $('.modal-amountpaid').modal("show");


      
});

//6. ON CHANGE DISCOUNT
$('#formdiscount').on('change', function(){
	var formdiscount = $('#formdiscount').val();
	$('#discount').val(formdiscount); 
 
	var total = 0;
	var discount = 0;
	var grandtotal = 0;
	var amountpaid = 0;
	var change_or_balance = 0;
	var grandtotal_ans = 0; 
	total = $('#total').val();
	discount = $('#discount').val();
	grandtotal = $('#grandtotal').val();
	amountpaid = $('#cashamountpaid').val();
	grandtotal_ans = total - discount;
	change_or_balance = grandtotal_ans - amountpaid;
	$('#grandtotal').val(grandtotal_ans.toFixed(2));
	if(change_or_balance < 0)
	{
		
	$('#balance').val(0.00);
		
	}else
	{
	$('#balance').val(change_or_balance.toFixed(2));
	}
	 
	
	
	
}); 
//7. ON CHANGE AMOUNT PAID
$('#formamountpaid').on('change', function(){
	var formamountpaid = $('#formamountpaid').val();
	var total = 0;
	var discount = 0;
	var grandtotal = 0;
	var amountpaid = 0;
	var change_or_balance = 0;
	var grandtotal_ans = 0;
	$('#cashamountpaid').val(formamountpaid);
	total = $('#total').val();
	discount = $('#discount').val();
	grandtotal = $('#grandtotal').val();
	amountpaid = $('#cashamountpaid').val();
	grandtotal_ans = total - discount;
	change_or_balance = grandtotal_ans - amountpaid;
	$('#grandtotal').val(grandtotal_ans.toFixed(2));
	if(change_or_balance < 0)
	{
		
	$('#balance').val(0.00);
		
	}else
	{
	$('#balance').val(change_or_balance.toFixed(2));
	}
	 
	 
});
 
//8. ON CHANGE QTY STOCK
  $(".table tbody").on('change', '#totalqty', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var id=row.find("td:eq(0)").text();//id
    var cost=row.find("td:eq(6) input").val();//price
    var totalqty=row.find("td:eq(7) input").val();//sto 
	var total_per_item = totalqty * cost;//compute the total quantity times price 
	var total = 0; 
	var discount = 0;
	var grandtotal = 0;
	var amountpaid = 0;
	var change_or_balance = 0;
	discount = $('#discount').val();
	amountpaid = $('#cashamountpaid').val();
	
    totalprice=row.find("td:eq(8) input").val(total_per_item.toFixed(2));//totalpricing
    totalpricehidden=row.find("td:eq(9)").text(total_per_item.toFixed(2));//totalpricinghidden
			var table = document.getElementById("tablepurchase");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			total+=parseFloat(table.rows[i].cells[9].innerHTML);
			 
			}
			$('#total').val(total.toFixed(2));
	
	grandtotal = total - discount; 
	change_or_balance  = grandtotal - amountpaid;
	$('#grandtotal').val(grandtotal.toFixed(2));
	if(change_or_balance < 0)
	{
	$('#balance').val(0.00);
	}else{
		
	$('#balance').val(change_or_balance.toFixed(2));
		
	}
$.ajax({
	url:'change-qty.php',
	type:'POST',
	dataType:'json',
	data:{
		'update_qty':1,
		id:id,
		totalqty:totalqty,
		total:total
	},
	success:function(data)
	{
		$('#tblpurchase').load('addpurchase-table.php');
		$('#total').val(data.total.toFixed(2));
		 
		var total = 0;
		var discount = 0;
		var grandtotal = 0;
		var amountpaid = 0;
		var change_or_balance = 0;
		var grandtotal_ans = 0; 
		total = $('#total').val();
		discount = $('#discount').val();
		grandtotal = $('#grandtotal').val();
		amountpaid = $('#cashamountpaid').val();
		grandtotal_ans = total - discount;
		change_or_balance = grandtotal_ans - amountpaid;
		$('#grandtotal').val(grandtotal_ans.toFixed(2));
	if(change_or_balance < 0)
	{
		
	$('#balance').val(0.00);
		
	}else
	{
	$('#balance').val(change_or_balance.toFixed(2));
	}
		
	},
	error:function(data)
	{
		alert(data);
	}
	
});
}); 


//8. ON CHANGE QTY STOCK
  $(".table tbody").on('change', '#batchnumber', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var id=row.find("td:eq(0)").text();//id 
    var batchnumber=row.find("td:eq(4) input").val();//sto 
      
$.ajax({
	url:'submit-batchnumber.php',
	type:'POST', 
	data:{
		'submit':1,
		id:id,
		batchnumber:batchnumber
	},
	success:function(data)
	{
		$('#tblpurchase').load('addpurchase-table.php');
	}
 	
});
}); 
 
 
 
//9. DELETE ITEM FROM PURCHASE
  $(document).on('click','#btn-delete',function(e){
	e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var id=row.find("td:eq(0)").text();//id
	 $.ajax({
		url:'delete-purchase.php',
		type:'POST',
		dataType:'json',
		data:{
			'delete_purchase':1,
			id:id
		},
		success:function(data)
		{ 
			$('#tblpurchase').load('addpurchase-table.php');
		$('#total').val(data.total.toFixed(2));
		 
		var total = 0;
		var discount = 0;
		var grandtotal = 0;
		var amountpaid = 0;
		var change_or_balance = 0;
		var grandtotal_ans = 0; 
		total = $('#total').val();
		discount = $('#discount').val();
		grandtotal = $('#grandtotal').val();
		amountpaid = $('#cashamountpaid').val();
		grandtotal_ans = total - discount;
		change_or_balance = grandtotal_ans - amountpaid;
		$('#grandtotal').val(grandtotal_ans.toFixed(2));
	if(change_or_balance < 0)
	{
		
	$('#balance').val(0.00);
		
	}else
	{
	$('#balance').val(change_or_balance.toFixed(2));
	}
		},
		error:function(data)
		{
			alert(data);
		}
	 });
  
  });


//10. MODAL SUPPLIER
$('#btn-supplier').on('click', function(){
  $('.modal-supplier').modal("show");
});
//11. CLICK CHECK  SUPPLIER
$("#table_sup tbody").on('click', '#btn-select-supplier', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var id=row.find("td:eq(0)").text();//id
    var suppliername=row.find("td:eq(2)").text();//id
   $('#supplier').val(suppliername);
   $('#supplierid').val(id);
  $('.modal-supplier').modal("hide");
}); 

//12. MODAL PRODUCT
$('#btn-product').on('click', function(){ 
  $('.modal-select-product').modal("show");
});
//13. CHOOSE PRODUCT
$("#table_select-product tbody").on('click', '#btn-select-product', function(e){
    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var id=row.find("td:eq(0)").text();//id
    var productname=row.find("td:eq(2)").text();//id
    $('#barcode').val(productname);
	$('#barcode').trigger("change");
	
  $('.modal-select-product').modal("hide");
}); 
//14. SAVE PURCHASE TO INVENTORY
$('#btn-savepurchase').on('click',function(){
	var reference=$('#reference').val();
	var purchasedate=$('#purchasedate').val();
	var details=$('#details').val();
	var supplier=$('#supplier').val();
	var supplierid=$('#supplierid').val();
	var totalcost=$('#total').val();
	var discount=$('#discount').val();
	var grandtotal=$('#grandtotal').val(); 
	var amountpaid=$('#cashamountpaid').val();
	var balance=$('#balance').val();
	var status = $('#purchase_status').val();
	$.ajax({
	url:'savepurchase.php',
	type:'POST',
	data:{
	'savepurchase':1,
	reference:reference,
	purchasedate:purchasedate,
	details:details,
	supplier:supplier,
	supplierid:supplierid,
	totalcost:totalcost,
	discount:discount,
	grandtotal:grandtotal,
	amountpaid:amountpaid,
	balance:balance,
	status:status,
	},
	success:function(){
	alert('Successfuly Save');
		window.location.href="purchaselist.php";
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

$( function() {

 // Single Select
 $( "#supplier" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "autosearch-supplier.php",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function( data ) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
     // Set selection
     $('#supplier').val(ui.item.label); // display the selected text
     $('#supplier').val(ui.item.value); // save selected id to input
     return false;
  },
  focus: function(event, ui){
     $( "#supplier" ).val( ui.item.label );
     $( "#supplier" ).val( ui.item.value );
     return false;
   },
 });

});

$( function() {

 // Single Select
 $( "#barcode" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "autosearch-barcode.php",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function( data ) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
     // Set selection
     $('#barcode').val(ui.item.label); // display the selected text
     $('#barcode').val(ui.item.value); // save selected id to input
	
     return false;
  },
  focus: function(event, ui){
     $( "#barcode" ).val( ui.item.label );
     $( "#barcode" ).val( ui.item.value );
     return false;
   },
 });

});
function split( val ) {
   return val.split( /,\s*/ );
}
function extractLast( term ) {
   return split( term ).pop();
}


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
				  <li class="breadcrumb-item">Add purchase</li>
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
		<h5 style="margin-left:2%; 	">Add purchase item(s)</h5>
	 
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
	 

		  <!-- Messages Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style=" margin:1px;color:rgb(23, 162, 184);border-radius:2px;font-size:20px; ">
			  <i class="fas fa-bars"></i>
			  
			</a>
			<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="text-align:center;">
			  
		   
			 
		   
			  <a href="purchaselist.php" class="dropdown-item"  ><span class="fas fa-plus-circle"></span>Purchase List</a>
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
							  <p class="m-0">Purchase Date (Mm-dd-yyyy) <b style="color:coral;">*</b></p>
								<div class="input-group input-group-sm m-0 p-0 date" id="datepicker">
									<input type="text" class="form-control" id="purchasedate" name="purchasedate" value="<?php echo date("m-d-Y");?>">
									<span class="input-group-append">
										<span class="input-group-text bg-white">
										<i class="fa fa-calendar"></i>
										</span>
									</span>
								</div>
							 </div> 
				  <div class="form-group" >
                     <p class="m-0">Reference (Invoice #) <b style="color:coral;">*</b></p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="reference" name="reference" class="form-control float-right">

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default">
							<i class="fas fa-cicle"></i>
						  </button>
						</div>
				
					  
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
				  <div class="form-group" >
                     <p class="m-0">Supplier<b style="color:coral;">*</b></p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="supplier" name="supplier" class="form-control float-right">
						  <input type="hidden" id="supplierid" name="supplierid" >

						<div class="input-group-append">
						  <button type="submit" class="btn btn-primary" id="btn-supplier">
							<i class="fas fa-user"></i>
						  </button>
						</div>
				
					  
					  </div>
					  					  	<div class="col-md-12	" style="position:flex;margin-left:35px;">
				 
                  </div>
                  </div>

							</div>
												<div class="col-sm-4" style="float:left;">
								<div class="form-group" >
                     <p class="m-0">Status</p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						 <select class="form-control float-right" id="purchase_status">
						 <option value="Order">Order</option>
						 <option value="Receive">Receive</option>
						 </select>
 
				
					  
					  </div>
                  </div>
				  <div class="form-group" >
                     <p class="m-0">Document</p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="file" id="files" name="files" class=" float-right"> 

						 
				
					  
					  </div>
					  					  	<div class="col-md-12	" style="position:flex;margin-left:35px;">
				 
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
                    <th style="border:none;" width="200">Expiry Date</th> 
                    <th style="border:none;" width="200">Batch number</th> 
                    <th style="border:none;" width="100">Unit</th> 
                    <th  style="border:none;" width="100">Cost</th>  
                    <th  style="border:none;" width="150">Stock Count</th>   
                    <th style="border:none;" width="160">Total Cost</th>	 
                    <th  style="display:none;" width="160">Total cost hidden</th>	 
                    <th align="center" style="border:none;"> <i class="fas fa-times" style="padding-left:10px;"></i></th>
               
                  </thead>
                  <tbody id="tblpurchase"> 
				<?php include('addpurchase-table.php');?>
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
				    <td></td>   
				    <td align="right" border="none">Total:</td>   
				    <td id="total_cell">
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="total" name="total" class="form-control" value="<?php echo number_format($total_allitem,2,'.','');?>" style="font-size:1rem;"disabled>

					 
					
					  
					  </div>
					</td>

					<td style="display:none;" >0.00</td>					
					<td>--</td>
                  </tr>
				     <tr> 
				    <td style="display:none;"> </td>
				    <td> </td>
				    <td> </td>
				    <td> </td>    
				    <td> </td>    
				    <td> </td>   
				    <td> </td>     
				    <td align="right">Discount:</td>   
				    <td id="discount_cell">
					  <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="discount" name="discount" class="form-control" value="0" style="font-size:1rem;"disabled>

						<div class="input-group-append"  >
						  <button type="submit" id="btn-discount"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-pen"></i>
						  </button>
						</div>
				
					  
					  </div>
					
					
					</td>   
					
					<td style="display:none;" >0.00</td>
					<td>--</td>
                  </tr>
				  	     <tr> 
				    <td style="display:none;"> </td>
				    <td> </td>
				    <td> </td>    
				    <td> </td>      
				    <td> </td>      
				    <td></td>   
				    <td></td>   
				    <td align="right">Grand total:</td>   
				    <td id="grandtotal_cell"> 
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="grandtotal" name="grandtotal" class="form-control" value="<?php echo number_format($grandtotal_allitem,2,'.','');?>" style="font-size:1rem;"disabled>
	<div class="input-group-append"  >
						  <button type="submit" id="btn-amountpaid"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-"></i>
						  </button>
						</div>
				 
				
					  
					  </div>
					</td> 

					<td style="display:none;">0.00</td>					
					<td>--</td>
                  </tr>
				        <tr>     
				    <td style="display:none;" > </td>   
				    <td> </td>   
				    <td> </td>   
				    <td> </td>   
				    <td> </td>   
				    <td></td>   
				    <td></td>   
				    <td align="right">Paid:</td>   
				    <td id="amountpaid_cell" style="font-weight:700;">
					  <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="cashamountpaid" name="cashamountpaid" class="form-control" value="0" style="font-size:1rem;"disabled>

						<div class="input-group-append"  >
						  <button type="submit" id="btn-amountpaid"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-pen"></i>
						  </button>
						</div>
				
					  
					  </div>
					</td>  

					<td  style="display:none;">0.00</td>					
					<td>--</td>
                  </tr>
				   <tr> 
				    <td style="display:none;"></td>
				    <td></td>
				    <td> </td>    
				    <td> </td>    
				    <td> </td>      
				    <td> </td>      
				    <td></td>   
				    <td align="right">Balance:</td>   
				    <td id="balance_cell">
					  <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="balance" name="balance" class="form-control" value="0" style="font-size:1rem;"disabled>

					 
				
					  
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
               
               <button type="button" id="btn-savepurchase" name="btn-savepurchase" class="col-md-2 btn btn-primary btn-save"  id="update-product">Save Purchase</button>
			  
			  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
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
  <!-- Add product ,update product ,delete product section-->	   
 <?php include('form-edit-purchase.php');?>
	  <!--END OF MODAL SAVE-->
	        <!--MODAL PAGE DISCOUNT-->
     <?php include('form-discount.php');?>
	  <!--END OF MODAL DISCOUNT-->
	   <!--MODAL PAGE AMOUNT PAID-->
			<?php include('form-payment.php');?>
	  <!--END OF MODAL PAID AMOUNT-->
	  	   <!--MODAL PAGE AMOUNT PAID-->
			<?php include('form-supplier.php');?>
	  <!--END OF MODAL PAID AMOUNT-->
	  	  	   <!--MODAL PAGE AMOUNT PAID-->
			<?php include('form-product.php');?>
	  <!--END OF MODAL PAID AMOUNT-->
	  <script type="text/javascript">
	  $(function(){
		 $('#datepicker').datepicker(); 
	  });
	  </script>
	