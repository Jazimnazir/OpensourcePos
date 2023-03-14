<script> 
$(document).ready(function(){
$('#barcode').focus(); 

$('.modal-payment').on('shown.bs.modal', function() {
		$('#amountpaid').focus();
});

$(document).on('click','li',function(){
	$('#barcode').val($(this).text());
	$('#productlist').fadeOut();
	
});

//1.) SEARCH ITEM BARCODE
$('#barcode').on('change',function(e){

	e.preventDefault();     
	e.stopImmediatePropagation();
	var barcode = $('#barcode').val();
	var holdid = $('#holdid').val();
	$.ajax({
		url:'search-item-sale.php',
		type:'POST',
		dataType:'json',
		data:{
			'searchitem':1,
			barcode:barcode,
			holdid:holdid
		},
		success:function(data){
		var status=data.status;
		if(status=="nostock")
			{
				alert('Sorry! please check available stock');
			} 
		$('#tblsalecart').load('table-salecart.php?hold='+holdid);
		$('#barcode').val('');
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=$('#amountpaid').val();
		var grandtotal=total-discount;
		var amountdue=grandtotal-amountpaid;
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
	});
 //2.) CHANGE Qty
$(".table tbody").on('change', '#totalqty', function(e){
    e.stopImmediatePropagation();
 
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty=row.find("td:eq(4) input").val();
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	var holdid=$('#holdid').val();
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			holdid:holdid,
			qty:qty
		},
		success:function(data){
		var status=data.status;
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=$('#amountpaid').val();
		var grandtotal=total-discount;
		var amountdue=grandtotal-amountpaid;
		if(status=="nostock")
			{
				alert('Sorry! please check available stock');
			} 
		$('#tblsalecart').load('table-salecart.php?hold='+holdid);
		$('#barcode').val('');
 
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
//3.) REMOVE ITEM 
$(".table tbody").on('click', '#removeitem', function(e){
	    e.stopImmediatePropagation();
 
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty=row.find("td:eq(4) input").val();
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	var holdid= $('#holdid').val();
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			holdid:holdid,
			qty:0
		},
		success:function(data){
		var status=data.status;
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=$('#amountpaid').val();
		var grandtotal=total-discount;
		var amountdue=grandtotal-amountpaid;
		if(status=="nostock")
			{
				alert('Sorry! please check available stock');
			} 
		$('#tblsalecart').load('table-salecart.php?hold='+holdid);
		$('#barcode').val('');
 
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
//4.) ADD(+) ITEM 
$(".table tbody").on('click', '#btn-add', function(e){
 e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty= parseFloat(row.find("td:eq(4) input").val());
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	var holdid = $('#holdid').val();
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			holdid:holdid,
			qty:qty+1
		},
		success:function(data){
		var status=data.status;
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=$('#amountpaid').val();
		var grandtotal=total-discount;
		var amountdue=grandtotal-amountpaid;
		if(status=="nostock")
			{
				alert('Sorry! please check available stock');
			} 
		$('#tblsalecart').load('table-salecart.php?hold='+holdid);
		$('#barcode').val('');
 
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
//5.) SUB(-) ITEM 
$(".table tbody").on('click', '#btn-sub', function(e){
 
	e.stopImmediatePropagation();
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty= parseFloat(row.find("td:eq(4) input").val());
    var available=row.find("td:eq(7) input").val();
	var compute=available-qty;
	var holdid = $('#holdid').val();
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			holdid:holdid,
			qty:qty-1
		},
		success:function(data){
		var status=data.status;
		var total = data.total;
		var item = data.item;
		var discount=$('#add_discount').val();
		var amountpaid=$('#amountpaid').val();
		var grandtotal=total-discount;
		var amountdue=grandtotal-amountpaid;
		if(status=="nostock")
			{
				alert('Sorry! please check available stock');
			} 
		$('#tblsalecart').load('table-salecart.php?hold='+holdid);
		$('#barcode').val('');
 
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
//6.) CLICK BTN-PAYMENT
$('#btn-payment').on('click',function(){
  
    $('.modal-payment').modal("show"); 
		$('#balance').css("background-color","white");
		$('#change').css("background-color","white");
		$('#change').css("color","black");
		$('#balance').css("color","black");
});
//7.) CLICK BTN-CUSTOMER
$('#btn-customer').on('click',function(){
    $('.modal-customer').modal("show");
		$('#amountpaid').focus();
});
//8.) CLICK BTN-DISCOUNT
$('#btn-discount').on('click',function(){
    $('.modal-discount').modal("show");
});
//9.) CLICK-BTN QUANTITY
$('#btn-quantity').on('click',function(){
    $('.modal-quantity').modal("show");
});
//9.1) CLICK-BTN QUANTITY
$('#btn-credit').on('click',function(){
	var total = $('#f_total').val(); 
	$('#cred_total').val(total);
	$('#cred_balance').val(total);
    $('.modal-addcredit').modal("show");
});
//8.) CLICK BTN-DISCOUNT
$('#btn-hold').on('click',function(){
    $('.modal-hold').modal("show");
});
//10.) SELECT CUSTOMER 
	$("#tblcustomer").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var id=row.find("td:eq(0)").text(); //getting the row column selected
	    var name=row.find("td:eq(1)").text(); //getting the row column selected
		$('#customerid').val(id);
		$('#creditor').val(name);
 
 });	
//11.) QUANTITY ON CHANGE
$('#add_discount').on('change',function(){
var add_discount=$('#add_discount').val();
var totalprice=parseFloat($('#totalprice').text());
var amountpaid=$('#amountpaid').val();
var grandtotal=totalprice-add_discount;
var amountdue=grandtotal-amountpaid;
$('#amountdue').text(amountdue.toFixed(2));
$('#discount').text(add_discount);
$('#total').val(amountdue.toFixed(2));
$('#f_total').val(amountdue.toFixed(2));
});
//12.) AMOUNT PAID KEYUP
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
		$('#change').css("color","black");
	}else if(total<0)//balance
	{
		$('#change_balance').text("Balance:");
		$('#change').css("background-color","white");
		$('#change').css("color","red");
	}
});
//13.) CLICK BUTTON PAYMENT
$('#submitpayment').on('click',function(){
	var totalprice=$('#total').val();
	var discount=$('#add_discount').val();
	var amountdue=$('#f_total').val();
	var amountpaid=$('#amountpaid').val();
	var balance=$('#balance').val();
	var change=$('#change').val();
	var customerid=$('#customerid').val();
	var holdid = $('#holdid').val();
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
			balance:balance,
			change:change,
			customerid:customerid,
			holdid:holdid
		},
		success:function(data){
			 if(data.status==1)
			 {
				 alert('Successfuly paid');
				 window.location.href="../POS/index.php";
			 }
		},
		error:function(data){
			alert(data);
		}
	});
	return false;
});
$('#btn-return').on('click',function(){
	$('.modal-solditem').modal("show");
});
	$("#tblsoldcustomer").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var customerid=$('#customerid').val();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var invoice=row.find("td:eq(1)").text(); //getting the row column selected
		window.location.href="../Return-item/index.php?invoice="+invoice+"&&customerid="+customerid;
  
 });
	$("#tblcreditlist").on('click', 'tr', function(e){
		e.stopImmediatePropagation(); 
		var row=$(this).closest("tr"); //getting the selected row of table
	    var customerid=row.find("td:eq(0)").text(); //getting the row column selected
	    var invoice=row.find("td:eq(2)").text(); //getting the row column selected
		window.location.href="../Credit-item/index.php?invoice="+invoice+"&&customer="+customerid;
  
 }); 
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
 $('#creditlist').on('click',function(){
	$('.modal-creditlist').modal("show");
 });
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
 
$('#barcode').on('keyup',function(){
	var barcode=$(this).val();
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
			$('#productlist').fadeIn();
			$('#productlist').html(data);
		}
	});
	return false;
	 }else{
		 $('#productlist').html('');
	 }
});
 
});
</script> 
<input type="hidden" id="holdid" value="<?php echo $_GET['hold']?>">
 <section class="content">
      <div class="container-fluid">
        <div class="row">
 
          <div class="col-md-7 p-1">   <!-- /SIDE BAR PRODUCT CONTENT -->
            <div class="card">
              <div class="card-header p-2">
			  
                    <div class="input-group input-group-md p-1" >
						    <div class="input-group-append">
						 
							</div>
						 
						  <input type="search" id="barcode" name="barcode" class="form-control form-control-sm float-right p-1" style="font-size:17px;padding:5px;height:40px;"  placeholder="Scan barcode/search item code , name" title="Start typing or scanning">
  <div class="input-group-append">
						  <button type="submit" class="btn btn-primary p-1" style="font-size:0.7rem;border-radius:0px;" id="btn-barcode">
							<i class="fas fa-barcode p-1"></i>
						  </button>
						</div>
						 
				 
					  </div>
					  
					  <div id="productlist">
					  
					  </div>
                <ul class="col-md-12 nav nav-pills" style="font-size:0.8rem;">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">All items</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Drinks</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Bread</a></li> 
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Noodles</a></li> 
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">All items</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Drinks</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Bread</a></li> 
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Noodles</a></li>    
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body p-0">
					<table>
					<tbody id="listproduct">
					<tr > 
					<td><button class="btn btn-app bg-default p-0 m-0" style="width:70px;height:70px;font-size:15px;"> 1</button> 
					<td><button class="btn btn-app bg-default p-0 m-0" style="width:70px;height:70px;font-size:15px;"> 1</button> 
					<td><button class="btn btn-app bg-default p-0 m-0" style="width:70px;height:70px;font-size:15px;"> 1</button> 
					<td><button class="btn btn-app bg-default p-0 m-0" style="width:70px;height:70px;font-size:15px;"> 1</button> 
					<td><button class="btn btn-app bg-default p-0 m-0" style="width:70px;height:70px;font-size:15px;"> 1</button> 
					<td><button class="btn btn-app bg-default p-0 m-0" style="width:70px;height:70px;font-size:15px;"> 1</button> 
					<td><button class="btn btn-app bg-default p-0 m-0" style="width:70px;height:70px;font-size:15px;"> 1</button> 
					</td>    
					</tr> 
					
					</tbody>
					</table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
		            <div class="col-md-5 p-0 m-0"> <!-- /SIDE BAR ITEM -->

            <!-- Profile Image -->
            <div class="card card-primary card-outline m-1" style="padding-top:2px;">
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
$cashierid=$_SESSION['userid'];
$total=0.00;
 $sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$cashierid."'");
 if(mysqli_num_rows($sql)>0)
 {
	 while($row=mysqli_fetch_array($sql))
	 {
		$total+=$row['subtotal']; 
	 }
	  
 } 
?>
                      <input class="form-control form-control-sm" type="text" id="total" placeholder="No item(s)" value="<?php echo number_format($total,2,".",",");?>" style="font-size:30px;height:60px;-padding:1px;background-color:coral;color:#ffff;" disabled>
                   <table   class="table table-bordered table-hover" id="tblactivity">
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
					<td id="amountdue">0.00</td>
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
			 <button type="button" title="Hold item" id="btn-hold" name="btn-savepurchase" class="col-md-3 btn btn-warning float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;">Hold item  </button>
			 <button type="button" title="Credit item" id="btn-credit" name="btn-savepurchase" class="col-md-2 btn btn-danger float-left" style="background-image:url('../icons/cartred1.png');background-repeat:no-repeat;background-position:left;border-radius:0px;margin-top:1px;margin-right:2px;">Credit</button>
			 <button type="button" title="New Transaction" id="btn-clear" name="btn-savepurchase" class="btn btn-default float-left" style="border-radius:0px;margin-top:1px;background:rgb(5, 71, 110);color:#ffff;border:1px solid rgb(5, 71, 110);width:127px;">Clear</button>
			 <button type="button" title="Modify Quantity new added"id="btn-quantity" name="btn-savepurchase" class="col-md-3 btn btn-primary float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;">Quantity</button>
			 <button type="button" title="Add Return item" id="btn-return" name="btn-savepurchase" class="col-md-2 btn btn-default float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;background:rgb(125, 52, 16);border:1px solid rgb(166, 74, 0);color:#ffff;background-image:url('../icons/return1.png');background-repeat:no-repeat;background-position:left;">Return</button>
			 <button type="button" title="Add discount " id="btn-discount" name="btn-savepurchase" class="btn btn-primary float-left" style="border-radius:0px;margin-top:1px;width:127px;background-image:url('../icons/discount.png');background-repeat:no-repeat;background-position:left;">Discount  </button>
				 
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
	<!--END OF SOLDITEM-->