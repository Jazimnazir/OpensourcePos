<script> 
$(document).ready(function(){
 
 
//6.) CLICK BTN-PAYMENT
$('#btn-payment').on('click',function(){
 
    $('.modal-payment').modal("show");
		$('#amountpaid').focus();
		$('#balance').css("background-color","white");
		$('#change').css("background-color","white");
		$('#change').css("color","black");
		$('#balance').css("color","black");
});
 
//10.) SELECT ITEM TO RETURN 
	$("#tblinvoicelist").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var invoice=row.find("td:eq(2)").text(); //getting the row column selected 
		var customer=$('#customer').val();
		window.location.href="index.php?customer="+customer+"&&invoice="+invoice;
 
	return false;
 
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
	var amountdue=$('#f_total').val();
	var cash_tender=$('#amountpaid').val(); 
	var change=$('#change').val();
	var customer=$('#customer').val();
	var invoice=$('#invoice').text();
 
	$.ajax({
		url:'submit-credit.php',
		type:'POST',
		dataType:'json',
		data:{
			'submit_credit':1,
			amountdue:amountdue,
			cash_tender:cash_tender,
			change:change,
			invoice:invoice,
			customer:customer
			
		},
		success:function(data){
			 if(data.status==1)
			 {
				 alert('Successfuly paid credit');
				 window.location.href="index.php";
			 }
		},
		error:function(data){
			alert(data);
		}
	});
	return false;
});
$('#btn-cancel').on('click',function(){
	window.location.href="../POS/index.php";
});
 
});
</script> 
<?php
$total_balance=0;
?>
<input type="hidden" id="customer" value="<?php echo $_GET['customer'];?>">
 <section class="content">
      <div class="container-fluid">
        <div class="row">
 
          <div class="col-md-7 p-1"  >   <!-- /SIDE BAR PRODUCT CONTENT -->
            <div class="card card-warning card-outline">
              <div class="card-header p-0">
			  
            
					   <table   class="table table-bordered table-hover" id="tblreturnitem">
                  <thead class="p-0"style="background-color:rgb(49, 188, 204);color:white;font-size:0.9rem;font-weight:400;">
              
                    <th class="p-1" style="display: none;">hidden(productid)</th> 
                    <th  class="p-1" style="border:none;">Purchase Date</th>  
                    <th  class="p-1" style="border:none;">Invoice #</th>  
                    <th class="p-1" style="border:none;">Item(s)</th>  
                    <th class="p-1" style="border:none;">Subtotal</th>  
                    <th class="p-1" style="border:none;">Discount</th>  
                    <th class="p-1" style="border:none;">Amount due</th>  
                    <th class="p-1" style="border:none;">Paid</th>  
                    <th class="p-1" style="border:none;" align="right">Balance</th>   
                  </thead>
                  <tbody id="tblinvoicelist" style="opacity:0.9;">
						<?php include('table-salecart.php');?>
                  </tbody>
					<tfoot style="background-color:rgb(49, 188, 204);color:white;font-size:0.9rem;font-weight:400;padding:1px;">
					 
					<td class="p-1">Purchase Date</td>
					<td class="p-1">Invoice #</td>
					<td class="p-1">Item(s)</td>
					<td class="p-1">Subtotal</td>
					<td class="p-1">Discount</td>
					<td class="p-1">Amount due</td>
					<td class="p-1">Paid</td> 
					<td class="p-0" style="font-size:16px;">Balance: <?php echo $total_balance;?></td>
					 
				</tfoot>

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
            <div class="card card-warning card-outline m-1" style="padding-top:2px;">
		 
              <div class="card-body p-0">
			   
<?php
include_once('../database.php');
$cashierid=0;
$total=0.00;
$fullname='';
$total=0;
$discount=0;
$amountdue=0;
$balance=0;
$item=0;

$customer=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE customerId='".$_GET['customer']."'");
while($row=mysqli_fetch_array($customer))
{
	$fullname=$row['fullname'];
}
 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE  invoiceId='".$_GET['invoice']."' AND customerId='".$_GET['customer']."'");
 if(mysqli_num_rows($sql)>0)
 {
	 while($row=mysqli_fetch_array($sql))
	 {
		 $item=$row['totalitem'];
		 $total=$row['totalprice'];
		 $balance=$row['balance'];
		 $amountdue=$row['amountdue'];
		 $discount=$row['discount'];
		 
	 }
	  
 } 
?>
               <div class="col-md-3 float-left">
			  <p>Credit Details*</p>
			  <p>Customer Name:</p>
			  <p>Invoice #:</p>
			  <p>Item(s):</p> 
			  <p>Balance:</p>
			  </div>
			  <div class="col-md-5 float-left">
			  <p>-</p>
			  <p><?php echo $fullname;?></p>
			  <p id="invoice"><?php echo $_GET['invoice'];?></p>
			   <p><?php echo $item;?></p>
			   <p><?php echo $balance;?></p>
			  </div>
                   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead class="p-0"style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
              
                    <th class="p-1" style="display: none;">hidden(productid)</th> 
                    <th  class="p-1" style="border:none;">Product name</th>  
                    <th  class="p-1" style="border:none;">Unit</th>  
                    <th class="p-1" style="border:none;">Price</th>  
                    <th class="p-1" style="border:none;text-align:center;" width="120">Qty</th>    
                    <th class="p-1" style="border:none;" width="90">Subtotal</th>     
                  </thead>
                  <tbody id="tblreturncart">
				  <?php include('table-returncart.php');?>
				  
                  </tbody>
 

                </table>
				
  	 
				 	 				<div class="col-md-12 float-left btn p-0 m-0" style="text-align:left;font-size:0.9rem;background:rgb(170, 181, 173);color:#ffff;border:1.4px solid rgb(170, 181, 173);">
					<table style="padding:0px;">
					  
					<tbody>
					</tbody>
					<tr>
					<td>Item:</td> 
					<td width="2"></td> 	
					<td id="item"><?php echo $item;?></td>
					<td width="40"></td> 
					<td>Total:</td> 
					<td width="2"></td> 	
					<td id="totalprice"><?php echo number_format($total,2,".",",");?></td>
					<td width="40"></td> 
					<td>Discount:</td> 
					<td width="2"></td> 	
					<td id="discount"><?php echo $discount;?></td>
					<td width="70"></td> 
					<td>Amount due:</td> 
					<td width="2"></td> 	
					<td id="amountdue"><?php echo $amountdue;?></td>
					</tr>
					
					</table>
				</div>
 
              </div>
			  
              <!-- /.card-body -->
            </div>
			
            <!-- /.card -->
		 
			<div class="card">
			<div class="col-lg-12 p-1" style="	">
			 <button type="button" title="Proceed payment" id="btn-payment" name="btn-savepurchase" class="col-md-12 btn btn-success">Pay Balance </button>				 
			 <button type="button" title="Go back to pos sale" id="btn-cancel" name="btn-cancel" class="col-md-12 btn btn-warning">Back Pos </button>				 
			 	 
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
 