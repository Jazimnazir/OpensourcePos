	<script src="../plugins/export/src/jquery.table2excel.js"></script>
	<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<script>
$(document).ready(function(){ 
function doConfirm(msg, yesFn, noFn)
{
    var confirmBox = $("#confirmBox");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function()
    {
        confirmBox.hide();
    });
    confirmBox.find(".yes").click(yesFn);
    confirmBox.find(".no").click(noFn);
    confirmBox.show();
}

	$(".table tbody").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var invoice=row.find("td:eq(0)").text(); //getting the row column selected
		$.ajax({
		url:'fetch-itemlist.php',
		type:'POST',
		dataType:'json',
		data:
		{ 
			'searchitem':1,
			invoice:invoice
		},
		beforeSend:function()
		{
			console.log('Loading...');
		},
		success:function(data)
		{
			var purchaseby=data.purchaseby;
			var purchasedate=data.purchasedate;
			var supplier=data.supplier;
			var grandtotal=data.grandtotal;
			var amountpaid=data.amountpaid;
			var balance=data.balance;
			var reference=data.reference;
			var invoiceid=data.invoice;
		$('#supplier').text('Supplier: '+supplier);
		$('#purchasedate').text('Purchase Date: '+purchasedate);
		$('#purchaseby').text('Created By: '+purchaseby);
		$('#amountpaid').text('Amount paid: '+amountpaid);
		$('#balance').text('Balance: '+balance);
		$('#totalcost').text('Total cost: '+grandtotal);
		$('#purchaseid').val(invoiceid);
		$('#tblitemlist').load('itemlist.php',{'invoiceid':invoiceid,});	
		$('.modal-update').modal("show"); 
		},
		error:function()
		{
			alert('Error!');
		}
		}); 
 


});	
$(".table tbody").on('click', '#btn-payment', function(e){
	e.stopImmediatePropagation();
	var row=$(this).closest("tr"); //getting the selected row of table
	var invoice=row.find("td:eq(0)").text(); //getting the row column selected
	var reference=row.find("td:eq(2)").text(); //getting the row column selected
	var supplier=row.find("td:eq(3)").text(); //getting the row column selected
	var purchasedate=row.find("td:eq(4)").text(); //getting the row column selected
	var totalitem=row.find("td:eq(5)").text(); //getting the row column selected
	var totalqty=row.find("td:eq(6)").text(); //getting the row column selected
	var subtotal=row.find("td:eq(7)").text(); //getting the row column selected
	var discount=row.find("td:eq(8)").text(); //getting the row column selected
	var grandtotal=row.find("td:eq(9)").text(); //getting the row column selected
	var paid=row.find("td:eq(10)").text(); //getting the row column selected
	var balance=row.find("td:eq(11)").text(); //getting the row column selected
	if(reference=='')
	{
		reference="----";
	}
	if(supplier=='')
	{
		supplier="----";
	}
	if(purchasedate=='')
	{
		purchasedate="----";
	}	

	$("#txt-reference").text(reference);
	$("#txt-supplier").text(supplier);
	$("#txt-purchasedate").text(purchasedate);
	$("#txt-totalitem").text(totalitem);
	$("#txt-qty").text(totalqty);
	$("#txt-subtotal").text(subtotal);
	$("#txt-discount").text(discount);
	$("#txt-grandtotal").text(grandtotal);
	$("#txt-paid").text(paid);
	$("#txt-balance").text(balance);
	$("#f_total").val(balance);
	$("#payment_invoice").val(invoice);
	$("#payment_reference").val(reference);
	$('.modal-payment').modal("show"); 
	

});	
 
$('#edit-purchase').on('click', function(){
	var purchaseid = $('#purchaseid').val();
	$.ajax
	({
		url:'submit-edit-purchase.php',
		type:'POST',
		data:
		{
			'updating':1,
			purchaseid:purchaseid
		},
		success:function()
		{
				window.location.href="../edit-purchase/index.php?purchaseid="+purchaseid;
		},
		error:function(data){
			alert('Something went error');
		}
		
	});
 
});

$("#cash_tender").on("keyup",function(){
	$('#balance').css("background-color","");
	var amountpaid=$('#cash_tender').val();
	var amountdue=$('#f_total').val();
	var total=amountpaid-amountdue; 
	$('#change').val(total);
    if(total>=0)//change
	{
		 
		$('#change').css("background-color","white");
		$('#change').css("color","black");
	}else if(total<0)//balance
	{ 
		$('#change').css("background-color","white");
		$('#change').css("color","red");
	}
});
$('#delete-purchase').on('click',function(){
	var invoice = $("#purchaseid").val();
	if(confirm("Are you sure you want to delete this item?")){
		$.ajax({
			url:'submit-delete-purchase.php',
			type:'POST',
			data:
			{
				'delete':1,
				invoice:invoice,
			},
			success:function(){
				window.location.href="purchaselist.php";
			},
			error:function(data){
				alert("Something went error");
			}
		});

	
    }
    else{
        return false;
    }
});
$("#submitpayment").on("click",function(){
	var payment =$("#cash_tender").val();
	var balance= $("#f_total").val();
	var change = $("#change").val();
	var invoice=$("#payment_invoice").val();
	var reference=$("#payment_reference").val();
	if(payment<=0 || payment=='')
	{
		$('#amount-legend').show();
	}else
	{
		$.ajax
		({
			url:'submit-addpayment.php',
			type:'POST',
			dataType:'json',
			data:
			{
				'add-payment':1,
				invoice:invoice,
				reference:reference,
				balance:balance,
				change:change,
				payment:payment
				
			},
			success:function(data)
			{
				 alert("payment successfuly processed");
				 window.location.href="purchaselist.php";
			},
			error:function(data)
			{
				alert("Something went error");
			}
		});
		
		$("#cancel").trigger("click");
	}
});
$('#search_stock').on('keyup',function(){
	var search = $(this).val();
	$('#tblstock').load('search-stock.php',{search:search});
});

});
</script>
<style>
.table tr {
    cursor: pointer;
}
</style>
	 <div class="content-wrapper"  >
	 
										 
		<!-- Content Header (Page header) -->
		<section class="content-header" style="padding:1px;">
		  <div class="container-fluid">
			<div class="row mb-2">
			  
			  <div class="col-sm-12">
				<ol class="breadcrumb float-sm-left">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Stock list</li>
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
		<h5 style="margin-left:2%; 	">Stock list </h5>
	 
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
	 

		  <!-- Messages Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" style=" margin:1px;color:rgb(23, 162, 184);border-radius:2px;font-size:20px; ">
			  <i class="fas fa-bars"></i>
			  
			</a>
			<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="text-align:center;">
			  
		   
			 
		   
			  <a href="../purchase/addpurchase.php" class="dropdown-item"><span class="fas fa-plus-circle"></span>Add stock</a>
				  <div class="dropdown-divider"></div>
				  			  <a href="index.php" class="dropdown-item"><span class="fas fa-plus-circle"></span>Stock list</a>
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
						   
						  <input type="text" id="search_stock" name="search_stock" class="form-control float-right" placeholder="Search name here">

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