   <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  
 <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../plugins/autocomplete/jquery-ui.min.js"></script>
<link rel="stylesheet" href="../plugins/autocomplete/jquery-ui.min.css">
<input type="hidden" id="cashier1" value="<?php echo $_SESSION['fullname'];?>">
<script>
var cashier=$('#cashier1').val();
	     var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
</script>

<script> 
$(document).keydown(function(e){
	if(e.ctrlKey && e.keyCode == 13)
	{
		$('#btn-payment').trigger('click');
		
	}
		if(e.altKey && e.keyCode == 81)
	{
		$('#btn-quantity').trigger('click');
		
	}
});
 


$(document).ready(function(){

$('#amountpaid').keydown(function(e)
{
 	if(e.ctrlKey && e.keyCode == 13)
	{
	//last code to check	$('#')
	$('#submitpayment').trigger('click');
	}
});
//FUNCTION FILTER
function filtering(){
	
	var barcode=$('#barcode').val();
	 if(barcode!='')
	 {
		 
		 $.ajax({
		url:'search-product.php',
		type:'POST',
		async:false,
		cache:false,
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
//FUNCTION ADDITEM
function additem() 
{
 
	var barcode = $('#barcode').val();
	$.ajax({
		url:'search-item-sale.php',
		type:'POST',
		dataType:'json',
		async:false,
		cache:false,
		data:{
			'searchitem':1,
			barcode:barcode,
		},
		success:function(data){
		var status=data.status;
		if(status=="nostock")
			{
				  Toast.fire({icon: 'error',title:' Item, please check available stock'}); 
			} 
		$('#tblsalecart').load('table-salecart.php');
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=0;
		var grandtotal=total-discount;
		var amountdue=grandtotal;
		$('#item').text(item);
		$('#totalprice').text(total.toFixed(2));
		$('#total').val(amountdue.toFixed(2));
		$('#amountdue').text(amountdue.toFixed(2));
		$('#f_total').val(amountdue.toFixed(2)); 
		},
		error:function(error){
			alert(error);
		}
		});
		return false;
}

//1-BARCODE KEYUP
$('#barcode').on('keyup',function(e){
	e.stopImmediatePropagation(); 
if(!(e.keyCode == 38 || e.keyCode == 40))
{
	var barcode =$('#barcode').val();

if(barcode.length>=3){
 $.ajax
 ({
	url:'get-product.php',
	type:'POST',
	dataType:'json',
	async:false,
	cache:false,
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
}
 
});

//2 - INPUT QTY CHANGE
$(".table tbody").on('change', '#totalqty', function(e){
    e.stopImmediatePropagation();
 
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty=row.find("td:eq(4) input").val();
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	if(qty !='')
	{
			$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			qty:qty
		},
		success:function(data){
		var status=data.status;
		if(status=="nostock" || status=="0")
			{
				 Toast.fire({icon: 'error',title:' Item, please check available stock'}); 
			} 
		$('#tblsalecart').load('table-salecart.php');
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=0;
		var grandtotal=total-discount;
		var amountdue=grandtotal;
		$('#item').text(item);
		$('#totalprice').text(total.toFixed(2));
		$('#total').val(amountdue.toFixed(2));
		$('#amountdue').text(amountdue.toFixed(2));
		$('#f_total').val(amountdue.toFixed(2)); 
		},
		error:function(error){
			alert(error);
		}
	});
	return false;
	}else
	{
		window.location.href="index.php";
	}
});

//3 - (X)REMOVE ITEM 
$(".table tbody").on('click', '#removeitem', function(e){
	    e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty=row.find("td:eq(4) input").val();
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	let result = prompt("Enter pin code?");

if(result!=null)
{
	$.ajax({
		url:'fetching_pincode.php',
		type:'POST',
		dataType:'json',
		data:{
			'search':1,
			result:result
		},
		success:function(data)
		{
			if(data.status==1)
			{
					$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			qty:0
		},
		success:function(data){
		var status=data.status;
		if(status=="nostock" || status=="0")
			{
					 Toast.fire({icon: 'error',title:' Item, please check available stock'}); 
			} 
		$('#tblsalecart').load('table-salecart.php');
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=0;
		var grandtotal=total-discount;
		var amountdue=grandtotal;
		$('#item').text(item);
		$('#totalprice').text(total.toFixed(2));
		$('#total').val(amountdue.toFixed(2));
		$('#amountdue').text(amountdue.toFixed(2));
		$('#f_total').val(amountdue.toFixed(2)); 
		},
		error:function(error){
			alert(error);
		}
	});
	return false;

			}else
			{
				alert('Invalid pincode');
				$('#barcode').focus();
			}
			
		},
		error:function(data)
		{
			alert(data);
		}
	});
	//alert(result);
}
$('#barcode').focus();
  
});

//4 - (+) ADDITEM
$(".table tbody").on('click', '#btn-add', function(e){
 e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty= parseFloat(row.find("td:eq(4) input").val());
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			qty:qty+1
		},
		success:function(data){
		
		var status=data.status;
		if(status=="nostock" || status=="0")
			{
					 Toast.fire({icon: 'error',title:' Item, please check available stock'}); 
			} 
		$('#tblsalecart').load('table-salecart.php');
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=0;
		var grandtotal=total-discount;
		var amountdue=grandtotal;
		$('#item').text(item);
		$('#totalprice').text(total.toFixed(2));
		$('#total').val(amountdue.toFixed(2));
		$('#amountdue').text(amountdue.toFixed(2));
		$('#f_total').val(amountdue.toFixed(2));
		},
		error:function(error){
			alert(error);
		}
	});
	return false;
 

 
});

//5 (-) MINUS QTY 
$(".table tbody").on('click', '#btn-sub', function(e){
 
	e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty= parseFloat(row.find("td:eq(4) input").val());
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			qty:qty-1
		},
		success:function(data){
			
		var status=data.status;
		if(status=="nostock" || status=="0")
			{
					 Toast.fire({icon: 'error',title:' Item, please check available stock'}); 
			} 
		$('#tblsalecart').load('table-salecart.php');
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=0;
		var grandtotal=total-discount;
		var amountdue=grandtotal;
		$('#item').text(item);
		$('#totalprice').text(total.toFixed(2));
		$('#total').val(amountdue.toFixed(2));
		$('#amountdue').text(amountdue.toFixed(2));
		$('#f_total').val(amountdue.toFixed(2));
		
		},
		error:function(error){
			alert(error);
		}
	});
	return false;
 
 
 
});

 
 
//11.) INPT DISCNT
$('#add_discount').on('change',function(){
var add_discount=$('#add_discount').val();
var totalprice=parseFloat($('#totalprice').text());
var amountpaid=0;
var grandtotal=totalprice-add_discount;
var amountdue=grandtotal-amountpaid;
$('#amountdue').text(amountdue.toFixed(2));
$('#discount').text(add_discount);
$('#total').val(amountdue.toFixed(2));
$('#f_total').val(amountdue.toFixed(2));
$('#clear').trigger('click');
});

//12.) INPT AMOUNT
$('#amountpaid').on('keyup',function(){
 	$('#balance').css("background-color","");
	var amountpaid=$('#amountpaid').val();
	var amountdue=$('#f_total').val();
	var total=amountpaid-amountdue; 
	$('#change').val(total);
    if(total>=0)//change
	{
		
		$('#change_balance').text("Change:");
		$('#change').css("background-color","white");
		$('#change').css("color","green");
	}else if(total<0)//balance
	{
		
		$('#change').css("background-color","white");
		$('#change').css("color","red");
	}
});

// INPT AMNT CRDT
$('#amountpaid_cred').on('keyup',function(){
 	$('#balance_cred').css("background-color","");
	var amountpaid=$('#amountpaid_cred').val();
	var amountdue=$('#f_total_cred').val();
	var total=amountpaid-amountdue; 
	$('#change_cred').val(total.toFixed(2));
    if(total>=0)//change
	{
		
		$('#change_balance_cred').text("Change:");
		$('#change_cred').css("background-color","white");
		$('#change_cred').css("color","green");
	}else if(total<0)//balance
	{
		
		$('#change_cred').css("background-color","white");
		$('#change_cred').css("color","red");
	}
});

//13.) SBMT PYMNT
$('#submitpayment').on('click',function(){
	var totalprice=$('#totalprice').text();
	var discount=$('#add_discount').val();
	var amountdue=$('#f_total').val();
	var amountpaid=$('#amountpaid').val();
	var change=$('#change').val();
	var customerid=$('#customerid').val();
	
		if($('#amountpaid').val()=='' || $('#amountpaid').val()==0)
	{
		alert('Please Add amount to pay');
		$('#amountpaid').focus();
	}else if($('#change').val()<0)
	{
		$('#legend_payment').show();
	if($('#customerid').val()>0)
	{
		
	 
	$.ajax({
		url:'submit-payment.php',
		type:'POST',
		dataType:'json',
		data:{
			'sold':1,
			totalprice:totalprice,
			discount:discount,
			amountpaid:amountpaid,
			amountdue:amountdue,
			change:change,
			customerid:customerid
		},
		beforeSend:function()
		{
			$('#submitpayment').text="Loading...";
		},
		success:function(data){
			 if(data.status==1)
			 {
				
				
				 window.location.href="sale-receipt.php";
			 }
		},
		error:function(data){
			alert(data);
		}
	});
	return false;
	}
	
	}else
	{ 
		$.ajax({
		url:'submit-payment.php',
		type:'POST',
		dataType:'json',
		data:{
			'sold':1,
			totalprice:totalprice,
			discount:discount,
			amountpaid:amountpaid,
			amountdue:amountdue,
			change:change,
			customerid:customerid
		},
		beforeSend:function()
		{
			$('#submitpayment').text("Loading...");
		}, 
		success:function(data){
			 if(data.status==1)
			 {
				 
				 window.location.href="sale-receipt.php";
				 //  swal('Invoice#','Sales Transaction succeeded','success');
			 }
		},
		error:function(data){
			alert(data);
		}
	});
	return false;
	}
});

// SBMT CRDT PYMNNT
$('#submit-credit').on('click',function(){
	var totalprice=$('#totalprice').text();
	var discount=$('#add_discount').val();
	var amountdue=$('#f_total_cred').val();
	var amountpaid=$('#amountpaid_cred').val();
	var change=$('#change_cred').val();
	var customerid=$('#customerid').val();
	
		if($('#amountpaid_cred').val()=='' || $('#amountpaid_cred').val()==0)
	{
		 
			 Toast.fire({icon: 'error',title:' Amount, Add amount cash to pay'}); 
		$('#amountpaid').focus();
	}else
	{
	if($('#customerid').val()>0)
	{
		
	 
	$.ajax({
		url:'submit-credit.php',
		type:'POST',
		dataType:'json',
		data:{
			'sold':1,
			totalprice:totalprice,
			discount:discount,
			amountpaid:amountpaid,
			amountdue:amountdue,
			change:change,
			customerid:customerid
		},
		success:function(data){
			 if(data.status==1)
			 {
				 alert('Successfuly Credit');
				 window.location.href="index.php";
			 }
		},
		error:function(data){
			alert(data);
		}
	});
	return false;
	}else
	{
		var custoemrid = $('#customerid').val();
		alert(custoemrid);
	}
	
	}
}); 
 
 //16.) SUBMIT CREDIT BUTTON
 $('#submitcredit').on('click',function(){
	var customerid = $('#customerid').val();
	var amountdue = $('#cred_total').val();
	var balance = $('#cred_balance').val();
	var discount = $('#add_discount').val();
	$.ajax({
		url:'submit-credit.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'submit_credit':1,
			customerid:customerid,
			discount:discount,
			amountdue:amountdue,
			balance:balance
		},
		success:function(data)
		{
			if(data.status==1)
			{
				alert('Successfuly Credited');
			}
			window.location.href="index.php";
		},
		error:function()
		{
			alert('Something went wrong');
		}
	});
	
	
 }); 
 //18.) CLEAR CART BUTTON
 $('#btn-clear').on('click',function(){
		$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'clear':1
		},
		success:function(data){ 
		window.location.href="index.php";
		},
		error:function(error){
			alert(error);
		}
	});
	return false;
 });
 
//20.) SUBMIT HOLD BUTTON
$('#submit-hold').on('click',function(){
	var holdname = $('#holdname').val();
	$.ajax({
		url:'submit-hold.php',
		type:'POST',
		data:{
			'hold':1,
			holdname:holdname
		},
		success:function()
		{
			alert('Item hold succeeded');
			window.location.href="index.php";
		}
	});
	return false;
	
});
   
 $('#add_qty').on('change',function(){
	 $('#qty_close').trigger('click');
	 var qty =$(this).val();
	 var barcode = $('#tblsalecart tr:last').attr('id');
	 	if(qty !='')
	{
			$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			qty:qty
		},
		success:function(data){
			
		var status=data.status;
		if(status=="nostock" || status=="0")
			{
					 Toast.fire({icon: 'error',title:' Item, please check available stock'}); 
				$('#barcode').focus();
			} 
		$('#tblsalecart').load('table-salecart.php');
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=0;
		var grandtotal=total-discount;
		var amountdue=grandtotal;
		$('#item').text(item);
		$('#totalprice').text(total.toFixed(2));
		$('#total').val(amountdue.toFixed(2));
		$('#amountdue').text(amountdue.toFixed(2));
		$('#f_total').val(amountdue.toFixed(2));
		},
		error:function(error){
			alert(error);
		}
	});
	return false;
	}else
	{
		window.location.href="index.php";
	}
	 
	 

 
 });
 //CLICK CTGRY 
 $('#category').on('click','li',function(){
	var category=$(this).attr('data-id');
	$('#viewitem').load('view-item.php',{category:category});
 });
 //CLCK PRDCT VIEW
  $('.btn-product').on('click',function(){
	 var barcode=$(this).attr('data-id'); 
	$.ajax({
		url:'search-item-sale.php',
		type:'POST',
		dataType:'json',
		async:false,
		cache:false,
		data:{
			'searchitem':1,
			barcode:barcode,
		},
		success:function(data){
			
		var status=data.status;
		if(status=="nostock" || status=="0")
			{
					 Toast.fire({icon: 'error',title:' Item, please check available stock'}); 
				$('#barcode').focus();
			} 
		$('#tblsalecart').load('table-salecart.php');
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=0;
		var grandtotal=total-discount;
		var amountdue=grandtotal;
		$('#item').text(item);
		$('#totalprice').text(total.toFixed(2));
		$('#total').val(amountdue.toFixed(2));
		$('#amountdue').text(amountdue.toFixed(2));
		$('#f_total').val(amountdue.toFixed(2));
		},
		error:function(error){
			alert(error);
		}
		});
		return false;
 });
 $('#qty_close').on('click',function(){
	$('#barcode').focus(); 
 });
$('#returnitem').on('click',function(){
	$('#btn-return').trigger('click');
});

$('.filter').on('click','li',function(){
	var name = $(this).text();
	var code=$(this).attr('data-id');
	$('.filter').fadeOut(); 
	$('#barcode').val(code);
	$('#barcode').trigger('keyup');
	$('#barcode').focus();

}); 
$('#search_customer').on('keyup',function(){
	var search =$(this).val();
	$('#tblcustomer').load('search-customer.php',{search:search});
});
$('#search_invoice').on('keyup',function(){
	var search = $(this).val();
	$('#tblsoldcustomer').load('search-invoice.php',{search:search});
});
$('#closeregister').on('click',function(){
	$('#close_totalcash').text($('#sale_totalcash').text());
});

//SHOW MODAL 
	 
$('#barcode').focus();  
$('.modal-payment').on('shown.bs.modal', function() {
		 
		$('#amountpaid').val('');
		$('#amountpaid').trigger('keyup');
		$('#amountpaid').focus();
		
});
$('.modal-payment').on('hidden.bs.modal', function() {
		 $('#barcode').focus();
		
});
$('.modal-addcredit').on('shown.bs.modal', function() {
		$('#amountpaid').focus();
});
$('.modal-quantity').on('shown.bs.modal', function() {
		$('#add_qty').focus();

});
$('.modal-quantity').on('hidden.bs.modal', function() {
		$('#barcode').focus();
});

$("#product_filter").on('click','li',function(){
	$('#barcode').val($(this).text());
	$('#productlist').fadeOut();
	
});
//6.) CLICK BTN-PAYMENT
$('#btn-payment').on('click',function(){

	$.ajax({
		url:'load-pos.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'load':1,
		},
		success:function(data)
		{
			if(data.item==0)
			{ 
					 Toast.fire({icon: 'error',title:' Cart, Add Item first '}); 
				$('#barcode').focus();
			}else
			{
		$('.modal-payment').modal("show");
		$('#amountpaid').trigger('keyup');
		$('#balance').css("background-color","white");
		$('#change').css("background-color","white");
		$('#change').css("color","black");
		$('#balance').css("color","black");
				 
			}
		}
	});
 
});
$('#btn-dashboard').on('click',function(){
	window.location.href="../Dashboard.php";
});
//7.) CLICK BTN-CUSTOMER
$('#btn-customer').on('click',function(){
    $('.modal-customer').modal("show");
		$('#amountpaid').focus();
});

//8.) CLICK BTN-DISCOUNT
$('#btn-discount').on('click',function(){
  
		$.ajax({
		url:'load-pos.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'load':1,
		},
		success:function(data)
		{
			if(data.item==0){	 Toast.fire({icon: 'error',title:' Cart discount, Add item first'}); }else{ $('.modal-discount').modal("show");}
		}
	});
});
//9.) CLICK-BTN QUANTITY
$('#btn-quantity').on('click',function(){
		$.ajax({
		url:'load-pos.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'load':1,
		},
		success:function(data)
		{
			if(data.item==0){	 Toast.fire({icon: 'error',title:' Qty, Add item first'}) ;}else{ $('.modal-quantity').modal("show");$('#add_qty').val(null);}
		}
	});
    
});
//9.1) CLICK-BTN CREDIT
$('#btn-credit').on('click',function(){
	
	$.ajax({
		url:'load-pos.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'load':1,
		},
		success:function(data)
		{
			if(data.item==0){ Toast.fire({icon: 'error',title:' Error, Add item first to proceed transaction'});}else if($('#customerid').val()==0){	 Toast.fire({icon: 'error',title:' Customer, Please add customer to process credit sale!'});}else{
				let result = prompt("Enter pin code");
				if(result!=null){
					$.ajax({
						url:'fetching_pincode.php',
						type:'POST',
						dataType:'json',
						data:{
							'search':1,
							result:result
						},
						success:function(data)
						{
							if(data.status==1)
							{
													
								var total = $('#f_total').val(); 
								var balance=0-total;
								$('#f_total_cred').val(total);
								$('#change_cred').val(balance);
								$('.modal-addcredit').modal("show");

							}else
							{
									 Toast.fire({icon: 'error',title:' Warning, Invalid Pincode!'}); 
							}
							
						},
						error:function(data)
						{
							alert(data);
						}
					});
					//alert(result);
				}
 							
			} 
		}
	});
});
//8.) CLICK BTN-HOLDLIST
$('#btn-hold').on('click',function(){
	
	$.ajax({
		url:'load-pos.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'load':1,
		},
		success:function(data)
		{
			if(data.item==0){	 Toast.fire({icon: 'error',title:' Hold item, Add item first'}); }else{ $('.modal-hold').modal("show"); }
		}
	});

    
});
//8.) CLICK BTN-SALE
$('#salelist').on('click',function(){
 $('.modal-sale').modal("show");   
});
//8.) CLICK BTN-CLOSE REGISTER
$('#closeregister').on('click',function(){
 $('.modal-closeregister').modal("show");
});
//10.) SELECT CUSTOMER ROW
	$("#tblcustomer").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var id=row.find("td:eq(0)").text(); //getting the row column selected
	    var name=row.find("td:eq(1)").text(); //getting the row column selected
		$('#customerid').val(id);
	 	$('#customername').val(name);
		$('#customer_cancel').trigger("click");
	 
 
 });
 
//14.) POP-RETURN MODAL
$('#btn-return').on('click',function(){
let result = prompt("Enter pin code");
if(result!=null)
{
	$.ajax({
		url:'fetching_pincode.php',
		type:'POST',
		dataType:'json',
		data:{
			'search':1,
			result:result
		},
		success:function(data)
		{
			if(data.status==1)
			{
					$('.modal-solditem').modal("show");
			}else
			{
					 Toast.fire({icon: 'error',title:' Pincode, invalid password'}); 
			}
			
		},
		error:function(data)
		{
			alert(data);
		}
	});
	//alert(result);
}
});
//15.) SELECT CUSTOMER ROW TO RETURN ITEM
$("#tblsoldcustomer").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var customerid=$('#customerid').val();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var invoice=row.find("td:eq(1)").text(); //getting the row column selected
		window.location.href="../Return-item/index.php?invoice="+invoice+"&&customerid="+customerid;
  
 });
//15.) SELECT CUSTOMER CREDIT ROW
$("#tblcreditlist").on('click', 'tr', function(e){
		e.stopImmediatePropagation(); 
		var row=$(this).closest("tr"); //getting the selected row of table
	    var customerid=row.find("td:eq(0)").text(); //getting the row column selected
	    var invoice=row.find("td:eq(2)").text(); //getting the row column selected
		window.location.href="../Credit-item/index.php?invoice="+invoice+"&&customer="+customerid;
  
 }); 
 
 //17.) MODAL CREDIT LIST
 $('#creditlist').on('click',function(){
	$('.modal-creditlist').modal("show");
 });
 //21. MODAL SHOW HOLD ITEM 
$('#showholdlist').on('click',function(){
	$('.modal-holdlist').modal("show");
}); 
//CLICK HOLD ITEM LIST
$("#tblholdlist").on('click', 'tr', function(e){
		e.stopImmediatePropagation(); 
		var row=$(this).closest("tr"); //getting the selected row of table
	    var holdname=row.find("td:eq(0)").text(); //getting the row column selected 
 	 	$.ajax({
 	 		url:'unholditem.php',
 	 		type:'POST',
 	 		data:
 	 		{
 	 			'unholditem':1,
 	 			holdname:holdname
 	 		},success:function(data)
 	 		{
 	 			window.location.href="index.php";
 	 		},
 	 		error:function(e)
 	 		{
 	 			alert(e);
 	 		}
 	 	});

		//window.location.href="../Hold-item/index.php?hold="+holdid;
  
 });

$('#close_sale').on('click', function(){
	var cash_payment = $('#cashpayment').text();
	var subtotal_sale = $('#subtotal_sales').text();
	var sale_discount = $('#discount_sale').text();
	var sale_credit = $('#credit_sale').text();
	var total_sale = $('#totalcash_paid').text();
	var sale_expense = $('#expense_sale').text();
	var sale_return = $('#return_sale').text();
	var sale_totalcash = $('#sale_totalcash').text();
	var total_cash_drawer = $('#total_cash_drawer').val();
	$.ajax({
		url:'submit-close.php',
		type:'POST',
		data:
		{
			'close':1,
			cash_payment:cash_payment,
			subtotal_sale:subtotal_sale,
			sale_discount:sale_discount,
			sale_credit:sale_credit,
			total_sale:total_sale,
			sale_expense:sale_expense,
			sale_return:sale_return,
			sale_totalcash,
			total_cash_drawer
			
		},
		beforeSend:function()
		{
			$('#close_sale').text('Loading...');
		},
		success:function()
		{
			  window.location.href='../Cash-drawer/index.php';
		},
		error:function(error)
		{
			alert(error);
		}
	});
	
});
$('#logout').on('click',function(){
	let logout = confirm('Are you sure, want to logout?');
	if(logout==true)
	{
		$.ajax({
			url:'submit-logout.php',
			type:'POST',
			data:
			{
				'logout':1,
			},
			success:function()
			{
				window.location.href="../index.php";
			},
			error:function(error)
			{
				alert(error);
			}
		});
	}
});


$( function() {

 // Single Select
 $( "#barcode" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "autosearch-product.php",
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
  delay:0,
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
$('#btn-cancelholditem').on('click', function(){
 $.ajax
 ({
 	url:'sale-cancelhold.php',
 	type:'POST',
 	data:
 	{
 		'cancel':1,

 	},
 	success:function()
 	{
 		window.location.href="index.php";
 	},

 })
});

});
</script>
<style>
.filter li: 
{
	padding:2px;
	font-size:0.9rem;
	 
}
.filter li:hover
{
	background-color:#d1d7f1;
	cursor:pointer;
	font-weight:700;
}
</style> 
<?php
$holditem=0;
if($_SESSION['label']==6)
{ 
	echo "<script> 
	Toast.fire({icon: 'success',title:' Welcome! '+cashier})</script>";
	$_SESSION['label']='0';
	 
}
if($_SESSION['label']=='POS')
{ 
	echo "<script>Toast.fire({icon: 'success',title:'Sales transaction successfuly completed!, Thank you'})</script>";
	$_SESSION['label']='0';
	 
}

?>
 <?php

$gethold=mysqli_query($conn,"SELECT * FROM tblholditem WHERE cashierId='".$_SESSION['userid']."' AND onhold='1'");
if(mysqli_num_rows($gethold)>0)
{
$holditem=1;
}
 
 ?>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
 
          <div class="col-md-7 p-1">   <!-- /SIDE BAR PRODUCT CONTENT -->
            <div class="card">
              <div class="card-header p-2">
			  
                    <div class="input-group input-group-md p-1" >
						    <div class="input-group-append">
						 
							</div>
						 
						  <input type="search" id="barcode" name="barcode" class="form-control form-control-sm float-right p-1" style="font-size:17px;padding:5px;height:40px;"  placeholder="Scan barcode/search item code , name" title="Start typing or scanning" autofocus>
  <div class="input-group-append">
						  <button type="submit" class="btn btn-primary p-1" style="font-size:0.7rem;border-radius:0px;" id="btn-barcode">
							<i class="fas fa-barcode p-1"></i>
						  </button>
						</div>
						 
				 
					  </div>
					  
					 	<div class="col-md-5" style="position:flex;margin-left:2px;">
				 					  <div id="productlist" class="filter">
									 
									  </div>
							
				  
						</div>
                <ul class="col-md-12 nav nav-pills" style="font-size:0.8rem;" id='category'>
				<?php
				include('../database.php');
				$sql=mysqli_query($conn,"SELECT * FROM tblinventory GROUP BY category  LIMIT 0,10");
				if(mysqli_num_rows($sql)>0)
				{
					while($row=mysqli_fetch_array($sql))
					{
						echo "<li class='nav-item' data-id='".$row['category']."'><a class='nav-link' href='#activity' data-toggle='tab'>".$row['category']."</a></li>";
					}
				}
				?>
                   
                   
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body p-0" style="max-width:800px;" id="viewitem">
			  <?php include('view-item.php');?>
			  		 
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
		            <div class="col-md-5 p-0 m-0" > <!-- /SIDE BAR ITEM -->

            <!-- Profile Image -->
            <div class="card card-primary card-outline m-1">
              <div class="card-body p-0">
			  
                       
					    <div class="input-group input-group-sm p-1" >
						    <div class="input-group-append">
						 
						</div>
						 <input type="hidden" id="customerid" name="custoemrid" value="0">
						  <input type="search" id="customername" name="customername" class="form-control form-control-sm float-right p-"  value="Walk-in">
  <div class="input-group-append">
						  <button type="submit" class="btn btn-primary p-1" style="font-size:0.9rem;" id="btn-customer">
							<i class="fas fa-users p-1"></i>
						  </button>
						</div>
						 
				
					  
					  </div>
<?php
include_once('../database.php');
$cashierid=0;
$item=0;
$total=0.00;
 $sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$_SESSION['userid']."'");
 if(mysqli_num_rows($sql)>0)
 {
	 while($row=mysqli_fetch_array($sql))
	 {
		$total+=$row['subtotal']; 
	 }
	 $sql1=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$_SESSION['userid']."' GROUP BY productcode");
	 while($row=mysqli_fetch_array($sql1))
	 {
		 $row++;
	 }
	  
 } 
?>
                      <input class="form-control form-control-sm" type="text" id="total" placeholder="No item(s)" value="<?php echo number_format($total,2,".",",");?>" style="font-size:30px;height:60px;-padding:1px;background-color:coral;color:#ffff;" disabled>
                   <table   class="table table-bordered table-hover" id="tblactivity" >
                  <thead class="p-0"style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
              
                    <th class="p-1" style="display: none;">hidden(productid)</th> 
                    <th  class="p-1" style="border:none;">Product name</th>  
                    <th  class="p-1" style="border:none;">Unit</th>  
                    <th class="p-1" style="border:none;">Price</th>  
                    <th class="p-1" style="border:none;text-align:center;" width="120">Qty</th>    
                    <th class="p-1" style="border:none;" width="90">Subtotal</th>    
                    <th class="p-1" style="border:none;text-align:center;" width="30"> <i class="far fa-trash-alt"></i></th> 
                  </thead>
                  <tbody id="tblsalecart">
				  <?php include('table-salecart.php');?>
				  
                  </tbody>
 

                </table> 
  	 
				 	 				<div class="col-md-12 float-left btn p-0 m-0" style="text-align:left;font-size:0.9rem;background:rgb(170, 181, 173);color:#ffff;border:1.4px solid rgb(170, 181, 173);">
					<table style="padding:0px;">
					 
					</thead>
					<tbody>
					</tbody>
					<tr>
					<td>Item:</td> 
					<td width="2"></td> 	
					<td id="item">0</td>
					<td width="40"></td> 
					<td>Total:</td> 
					<td width="2"></td> 	
					<td id="totalprice"><?php echo number_format($total,2,".",",");?></td>
					<td width="40"></td> 
					<td>Discount:</td> 
					<td width="2"></td> 	
					<td id="discount">0</td>
					<td width="70"></td> 
					<td>Amount due:</td> 
					<td width="2"></td> 	
					<td id="amountdue"><?php echo $item;?></td>
					</tr>
					
					</table>
				</div>
 
              </div>
			  
              <!-- /.card-body -->
            </div>
			
            <!-- /.card -->
		 
			<div class="card">
			<div class="col-lg-12 p-0" style="	">
			 <button type="button" title="Proceed payment" id="btn-payment" name="btn-savepurchase" class="col-md-4 btn btn-default float-left bg-success" style="background-image:url('../icons/pay.png');background-repeat:no-repeat;background-position:center;margin-left:3px;border-radius:0px;height:80px;color:rgb(255, 255, 255);font-size:0.9rem;"> Payment</button>	
			 <?php
			 if($holditem==1)
			 {
			 	echo '<button type="button" title="Hold item" id="btn-cancelholditem" name="btn-cancelhold" class="col-md-3 btn btn-danger float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;">Cancel Hold</button>';
			 }else{

			 echo '<button type="button" title="Hold item" id="btn-hold" name="btn-holditem" class="col-md-3 btn btn-warning float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;">Hold item  </button>';
			}

			 ?>
 
			 <button type="button" title="Credit item" id="btn-credit" name="btn-savepurchase" class="col-md-2 btn btn-danger float-left" style=";border-radius:0px;margin-top:1px;margin-right:2px;">Credit</button>
			 <button type="button" title="New Transaction" id="btn-clear" name="btn-savepurchase" class="btn btn-default float-left" style="border-radius:0px;margin-top:1px;background:rgb(5, 71, 110);color:#ffff;border:1px solid rgb(5, 71, 110);width:127px;">Clear</button>
			 <button type="button" title="Modify Quantity new added"id="btn-quantity" name="btn-savepurchase" class="col-md-3 btn btn-primary float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;">Quantity</button>
			 <button type="button" title="Add Return item" id="btn-return" name="btn-savepurchase" class="col-md-2 btn btn-default float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;background:rgb(125, 52, 16);border:1px solid rgb(166, 74, 0);color:#ffff;">Return</button>
			 <button type="button" title="Add discount " id="btn-discount" name="btn-savepurchase" class="btn btn-primary float-left" style="border-radius:0px;margin-top:1px;width:127px;">Discount  </button>
				 
				</div>
			</div>
			   
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	<!--Modal for payment-->
<?php include('payment.php');?>
<!--End of payment-->

	<!--Modal CUSTOMER-->
 <?php include('table-customer.php');?>
<!--End of Customer-->

	<!--Modal for discount-->
	<?php include('discount.php');?>
	<!--END OF discount-->
 
	<!--Modal for SOLDITEM-->
	<?php include('quantity.php');?>
	<!--END OF QUANTITY-->
 	<?php include('table-sale.php');?>
	<!--END OF SOLDITEM-->
 	<!--END OF QUANTITY-->
 	<?php include('addcredit.php');?>
	<!--END OF SOLDITEM-->
		<!--END OF QUANTITY-->
 	<?php include('table-credit-customer.php');?>
	<!--END OF SOLDITEM-->
			<!--END OF QUANTITY-->
 	<?php include('modal-hold.php');?>
	 	<?php include('modal-sale.php');?>
	 	<?php include('modal-close-register.php');?>
	<!--END OF SOLDITEM-->
				<!--END OF QUANTITY-->
 	<?php include('table-holdlist.php');?>
	<!--END OF SOLDITEM-->