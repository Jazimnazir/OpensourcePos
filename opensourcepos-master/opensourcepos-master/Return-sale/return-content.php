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
$(document).ready(function(){

$(".table tbody").on('click', 'tr', function(e){
		e.stopImmediatePropagation();
		var row=$(this).closest("tr"); //getting the selected row of table
	    var productid=row.find("td:eq(0)").text(); //getting the row column selected

	     	$('.modal-quantity').modal("show"); 
	     	$('#solditemid').val(productid);
	     

});
$('.modal-quantity').on('shown.bs.modal', function() {
		 
			$('#add_qty').val("");
		$('#add_qty').focus();
		
});

$('#add_qty').keydown(function(e)
{
	var zero = $('#add_qty').val();
 	if(e.keyCode == 13 && zero !=0)
	{
		
	}
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
   
              <div class="card-body p-0" style="max-width:900px;" id="viewitem">
			  <?php include('view-returnlist.php');?>
			  		 
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
          
                      <input type="text" class=" form-control-lg float-left" style="border-radius:0px;border-right:0px;width:25%;font-size:15px;background-color:gray;border:none;color:#ffff;" value="Refund amount:">

                      <input type="text" class="form-control-lg float-left" value="100.00" style="font-size:30px;border-radius:0px;width:75%;border-left:0px;background-color:orange;border:none;color:#ffff;">
                   <table   class="table table-bordered table-hover" id="tblactivity" >
                  <thead class="p-0"style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
              
                    <th class="p-1" style="display: none;">hidden(productid)</th> 
                    <th  class="p-1" style="border:none;">Product name</th>  
                    <th  class="p-1" style="border:none;">Unit</th>  
                    <th class="p-1" style="border:none;">Price</th>  
                    <th class="p-1" style="border:none;text-align:center;" width="120">R-Qty</th>    
                    <th class="p-1" style="border:none;" width="90">Subtotal</th>    
                    <th class="p-1" style="border:none;text-align:center;" width="30"> <i class="far fa-trash-alt"></i></th> 
                  </thead>
                  <tbody id="tblsalecart">
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
					<td>Balance:</td> 
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
			 <button type="button" title="Proceed payment" id="btn-payment" name="btn-savepurchase" class="col-md-4 btn btn-default float-left bg-success" style="background-image:url('../icons/pay.png');background-repeat:no-repeat;background-position:center;margin-left:3px;border-radius:0px;height:80px;color:rgb(255, 255, 255);font-size:0.9rem;">Submit Return </button>	
 			<button type="button" title="Hold item" id="btn-hold" name="btn-holditem" class="col-md-3 btn btn-warning float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;" disabled>Hold item  </button>
			 <button type="button" title="Credit item" id="btn-credit" name="btn-savepurchase" class="col-md-2 btn btn-danger float-left" style=";border-radius:0px;margin-top:1px;margin-right:2px;" disabled>Credit</button>
			 <button type="button" title="New Transaction" id="btn-clear" name="btn-savepurchase" class="btn btn-default float-left" style="border-radius:0px;margin-top:1px;background:rgb(5, 71, 110);color:#ffff;border:1px solid rgb(5, 71, 110);width:127px;" disabled>Clear</button>
			 <button type="button" title="Modify Quantity new added"id="btn-quantity" name="btn-savepurchase" class="col-md-3 btn btn-primary float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;" disabled>Quantity</button>
			 <button type="button" title="Add Return item" id="btn-return" name="btn-savepurchase" class="col-md-2 btn btn-default float-left" style="border-radius:0px;margin-top:1px;margin-right:2px;background:rgb(125, 52, 16);border:1px solid rgb(166, 74, 0);color:#ffff;" disabled>Return</button>
			 <button type="button" title="Add discount " id="btn-discount" name="btn-savepurchase" class="btn btn-primary float-left" style="border-radius:0px;margin-top:1px;width:127px;" disabled>Discount  </button>
				 
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
 
 
	<!--Modal for SOLDITEM-->
	<?php include('quantity.php');?> 