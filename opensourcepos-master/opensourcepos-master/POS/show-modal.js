$(document).ready(function(){
	 
$('#barcode').focus();  
$('.modal-payment').on('shown.bs.modal', function() {
		$('#amountpaid').focus();
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
				alert('add item first');
			}else
			{
		$('.modal-payment').modal("show"); 
		$('#balance').css("background-color","white");
		$('#change').css("background-color","white");
		$('#change').css("color","black");
		$('#balance').css("color","black");
				 
			}
		}
	});
 
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
			if(data.item==0){alert('add item first');}else{ $('.modal-discount').modal("show");}
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
			if(data.item==0){alert('add item first');}else{ $('.modal-quantity').modal("show");$('#add_qty').val(null);}
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
			if(data.item==0){alert('add item first');}else if($('#customerid').val()==0){alert('Add customer for credit sale');}else{
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
								alert('Invalid pincode');
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
//8.) CLICK BTN-HOLD
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
			if(data.item==0){alert('add item first');}else{ $('.modal-hold').modal("show"); }
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
				alert('Invalid pincode');
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
$("#tblholdlist").on('click', 'tr', function(e){
		e.stopImmediatePropagation(); 
		var row=$(this).closest("tr"); //getting the selected row of table
	    var holdid=row.find("td:eq(1)").text(); //getting the row column selected 
		window.location.href="../Hold-item/index.php?hold="+holdid;
  
 });
});