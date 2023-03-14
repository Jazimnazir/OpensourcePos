<script> 
$(document).ready(function(){
//1.) SEARCH ITEM BARCODE
$('#barcode').on('change',function(e){
	e.preventDefault();     
	e.stopImmediatePropagation();
		 
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table 
		var barcode = $('#barcode').val();
		var qty=1;
		var invoice=$('#invoice').val();
	$.ajax({
		url:'return-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'returnitem':1,
			barcode:barcode,
			qty:qty,
			invoice:invoice
		},
		success:function(data)
		{
			var total = data.total;
			var item = data.item;
			var balance=$('#prev_balance').val();
			var discount=$('#prev_discount').val();
			var refund=total-balance;
			var cashback=refund-discount;
			if(data.status=="outstock"){
				alert("Please check item code!");
			}else{
				$('#barcode').val('');
			}
		$('#tblreturncart').load("table-returncart.php?invoice="+invoice);
		$('#tblsalecart').load("table-salecart.php?invoice="+invoice);
		$('#total').val(total.toFixed(2));
		$('#f_total').val(total.toFixed(2));
		$('#refund').val(cashback.toFixed(2));
		}
	});
	return false;
	});
 //2.) CHANGE Qty
$(".table tbody").on('change', '#totalqty', function(e){
    e.stopImmediatePropagation();
 
    var row=$(this).closest("tr"); //getting the selected row of table 
    var barcode=row.find("td:eq(0)").text();//id
    var qty=row.find("td:eq(4) input").val();
    var invoice=$('#invoice').val();
	 
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			invoice:invoice,
			barcode:barcode,
			qty:qty
		},
		success:function(data){
		var status = data.status;
		var item = data.item;
		var total = data.total;
		var discount = $('#prev_discount').val();
		var balance = $('#prev_balance').val();
		var refund =total-balance;
		var cashback=refund-discount;
		if(status=="outstock")
		{
			alert('Please!check quantity item to return');
		}
		$('#tblreturncart').load("table-returncart.php?invoice="+invoice);
		$('#tblsalecart').load("table-salecart.php?invoice="+invoice);
		$('#total').val(total.toFixed(2));
		$('#f_total').val(total.toFixed(2));
		$('#refund').val(cashback.toFixed(2));
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
    var qty=0;
    var invoice=$('#invoice').val();
	 
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			invoice:invoice,
			barcode:barcode,
			qty:qty
		},
		success:function(data){
		var status = data.status;
		var item = data.item;
		var total = data.total;
		var discount = $('#prev_discount').val();
		var balance = $('#prev_balance').val();
		var refund = total-prev_balance;
		var cashback = refund - discount;
		if(status=="outstock")
		{
			alert('Please!check quantity item to return');
		}
		$('#tblreturncart').load("table-returncart.php?invoice="+invoice);
		$('#tblsalecart').load("table-salecart.php?invoice="+invoice);
		$('#total').val(total.toFixed(2));
		$('#f_total').val(total.toFixed(2));
		$('#refund').val(cashback.toFixed(2));
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
	var invoice=$('#invoice').val();
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			invoice:invoice,
			qty:qty+1
		},
		success:function(data){
		var status = data.status;
		var item = data.item;
		var total = data.total;
		var discount = $('#prev_discount').val();
		var balance = $('#prev_balance').val();
		var refund = total-balance;
		var cashback = refund -discount;
		if(status=="outstock")
		{
			alert("Quantity Exceeded");
		}
		$('#tblreturncart').load("table-returncart.php?invoice="+invoice);
		$('#tblsalecart').load("table-salecart.php?invoice="+invoice);
		$('#total').val(total.toFixed(2));
		$('#f_total').val(total.toFixed(2));
		$('#refund').val(cashback.toFixed(2));

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
    var invoice=$('#invoice').val();
	 
	$.ajax({
		url:'change-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'changeqty':1,
			barcode:barcode,
			invoice:invoice,
			qty:qty-1
		},
		success:function(data){
		var status = data.status;
		var item = data.item;
		var total = data.total;
		var discount = $('#prev_discount').val();
		var balance = $('#prev_balance').val();
		var refund = total-balance;
		var cashback = refund - discount;
		$('#tblreturncart').load("table-returncart.php?invoice="+invoice);
		$('#tblsalecart').load("table-salecart.php?invoice="+invoice);
		$('#total').val(total.toFixed(2));
		$('#f_total').val(total.toFixed(2));
		$('#refund').val(cashback.toFixed(2));
 
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
});
//7.) CLICK BTN-CUSTOMER
$('#btn-customer').on('click',function(){
    $('.modal-customer').modal("show");
});
//8.) CLICK BTN-DISCOUNT
$('#btn-discount').on('click',function(){
    $('.modal-discount').modal("show");
});
//9.) CLICK-BTN QUANTITY
$('#btn-quantity').on('click',function(){
    $('.modal-quantity').modal("show");
});
//10.) SELECT ITEM TO RETURN 
	$("#tblreturnitem").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var barcode=row.find("td:eq(0)").text(); //getting the row column selected 
		var qty=1;
		var invoice=$('#invoice').val();
	$.ajax({
		url:'return-qty.php',
		type:'POST',
		dataType:'json',
		data:{
			'returnitem':1,
			barcode:barcode,
			qty:qty,
			invoice:invoice
		},
		success:function(data)
		{
			var total = data.total;
			var item = data.item;
			var discount = $('#prev_discount').val();
			var balance = $('#prev_balance').val();
			var refund = total-balance;
			var cashback = refund - discount;
			if(data.status=="outstock"){
				alert("Quantity Exceeded!");
			}
		$('#tblreturncart').load("table-returncart.php?invoice="+invoice);
		$('#tblsalecart').load("table-salecart.php?invoice="+invoice);
		$('#total').val(total.toFixed(2));
		$('#f_total').val(total.toFixed(2));
		$('#refund').val(cashback.toFixed(2));
		if(refund<0)
		{
			$('#refund').css("color","red");
		}
		
		}
	});
	return false;
 
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
			customerid:customerid
		},
		success:function(data){
			 if(data.status==1)
			 {
				 alert('Successfuly paid');
				 window.location.href="index.php";
			 }
		},
		error:function(data){
			alert(data);
		}
	});
	return false;
});
$('#submitreturn').on('click',function(){
	var total = $('#f_total').val();
	var balance = $('#prev_balance').val();
	var refund = $('#refund').val();
	var invoice = $('#invoice').val();
	var reason = $('#reason').val();
	$.ajax({
		url:'submit-return.php',
		type:'POST',
		dataType:'json',
		data:{
			'submitreturn':1,
			total:total,
			balance:balance,
			refund:refund,
			reason:reason,
			invoice:invoice
		},
		success:function(data)
		{
			if(data.status==1)
			{
				alert('Successfuly item returned');
				window.location.href="../POS/index.php";
			}
 
		},
		error:function()
		{
			alert('Error');
		}
	});
});
 
});
</script> 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
 
          <div class="col-md-7 p-1">   <!-- /SIDE BAR PRODUCT CONTENT -->
            <div class="card">
              <div class="card-header p-2">
			  
                    <div class="input-group input-group-md p-1" >
						    <div class="input-group-append">
						 
							</div>
						 <input type="hidden" id="invoice" value="<?php echo $_GET['invoice'];?>">
						  <input type="search" id="barcode" name="barcode" class="form-control form-control-sm float-right p-1" style="font-size:17px;padding:5px;height:40px;"  placeholder="Scan barcode (item return)" title="Scan item to return">
  <div class="input-group-append">
						  <button type="submit" class="btn btn-primary p-1" style="font-size:0.7rem;border-radius:0px;" id="btn-barcode">
							<i class="fas fa-barcode p-1"></i>
						  </button>
						</div>
						 
				
					  
					  </div>
					   <table   class="table table-bordered table-hover" id="tblreturnitem">
                  <thead class="p-0"style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
              
                    <th class="p-1" style="display: none;">hidden(productid)</th> 
                    <th  class="p-1" style="border:none;">Product name</th>  
                    <th  class="p-1" style="border:none;">Unit</th>  
                    <th class="p-1" style="border:none;">Price</th>  
                    <th class="p-1" style="border:none;text-align:center;" width="120">Qty(consume)</th>     
                    <th class="p-1" style="border:none;" width="90">Subtotal</th>     
                  </thead>
                  <tbody id="tblsalecart">
						<?php include('table-salecart.php');?>
                  </tbody>
 

                </table>
 
              </div><!-- /.card-header -->
              <div class="card-body">
 
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
						<?php
						$customer;
						$sql=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE customerId='".$_GET['customerid']."'");
						if(mysqli_num_rows($sql)>0)
						{
							while($row=mysqli_fetch_array($sql))
							{
								$customer=$row['fullname'];
							}
						}else
						{
							$customer='Walk-in';
						}
						
						?>
						    <div class="input-group-append">
						 
						</div>
						 <input type="hidden" id="customerid" name="custoemrid" value="0">
						  <input type="search" id="barcode" name="barcode" class="form-control form-control-sm float-right p-"  value="<?php echo $customer;?>( Return #.<?php echo $_GET['invoice']?>)" style="height:40px;font-size:25px;" disabled>
  <div class="input-group-append">
						   
						</div>
						 
				
					  
					  </div>
<?php
include_once('../database.php');
$cashierid=$_SESSION['userid'];
$total=0.00;
 $sql=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE cashierId='".$cashierid."' AND invoiceId='".$_GET['invoice']."'");
 if(mysqli_num_rows($sql)>0)
 {
	 while($row=mysqli_fetch_array($sql))
	 {
		$total+=$row['subtotal']; 
	 }
	  
 } 
?>
                      <input class="form-control form-control-sm" type="text" id="total" placeholder="No item(s)" value="<?php echo number_format($total,2,".",",");?>" style="font-size:30px;height:60px;-padding:1px;background-color:coral;color:#ffff;" >
                   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead class="p-0"style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
              
                    <th class="p-1" style="display: none;">hidden(productid)</th> 
                    <th  class="p-1" style="border:none;">Product name</th>  
                    <th  class="p-1" style="border:none;">Unit</th>  
                    <th class="p-1" style="border:none;">Price</th>  
                    <th class="p-1" style="border:none;text-align:center;" width="120">Qty(Receive)</th>    
                    <th class="p-1" style="border:none;" width="90">Subtotal</th>    
                    <th class="p-1" style="border:none;text-align:center;" width="30"> <i class="far fa-trash-alt"></i></th> 
                  </thead>
                  <tbody id="tblreturncart">
				  <?php include('table-returncart.php');?>
				  
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
			<div class="col-lg-12 p-1" style="	">
			 <button type="button" title="Proceed payment" id="btn-payment" name="btn-savepurchase" class="col-md-12 btn btn-default bg-warning" style="border-radius:0px;color:rgb(255, 255, 255);font-size:1rem;font-weight:700;"> Submit return</button>				 
			 <button type="button" title="Cancel" id="btn-cancel" name="btn-cancel" class="col-md-12 btn btn-default" style="background-color:gray;border-radius:0px;color:rgb(255, 255, 255);font-size:1rem;font-weight:700;">Cancel</button>				 
			 	 
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

 
 
	<!--Modal for QUANTITY-->
	<?php include('quantity.php');?>
	<!--END OF QUANTITY-->
 