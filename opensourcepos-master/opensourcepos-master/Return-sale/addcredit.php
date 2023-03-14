<script>
$(document).ready(function(){
 
$('#1000_cred').on('click',function(){
	var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+1000)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#500_cred').on('click',function(){
		var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+500)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#100_cred').on('click',function(){
	var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+100)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#50_cred').on('click',function(){
	var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+50)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#20_cred').on('click',function(){
	var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+20)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#10_cred').on('click',function(){
	var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+10)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#5_cred').on('click',function(){
	var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+5)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#1_cred').on('click',function(){
	var amount=parseFloat($('#amountpaid_cred').val());
	if($('#amountpaid_cred').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+1)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
$('#clear_cred').on('click',function(){
 
	var cash = parseFloat(0)
	$('#amountpaid_cred').val(cash);
	$('#amountpaid_cred').css("background-color","#fffb99");
	$('#amountpaid_cred').trigger('keyup');
});
});
</script>
<?php 
include('../database.php');
$ftotal=0;
$sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$_SESSION['userid']."'");
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_array($sql))
	{
		$ftotal+=$row['subtotal'];
	}
}
?>	
	
	<div class="modal modal-addcredit fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Finalize Credit payment </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <div class="row">
		<div class="col-md-12">
					<div class="col-md-7 float-left">
					<div class="form-group" >
					                     <p class="m-0">Amount due:</p>
						<input type="text" id="f_total_cred" name="f_total_cred" class="form-control float-right" style="height:40px;font-size:20px;font-weight:700;" value="<?php echo $ftotal;?>"disabled>
                     <p class="m-0">Down payment:</p>
					 <div class="input-group input-group-md m-0 p-0" >
						    
						  <input type="search" id="amountpaid_cred" name="amountpaid_cred" class="form-control float-right" placeholder="0.00" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
					 

						<div class="input-group-append">
						  <button type="submit" class="btn btn-success" id="btn-supplier">
							<i>&#8369;</i>
						  </button>
						</div>
				
					  
					  </div>
					  					  	 
                  </div>
				  					<div class="form-group" >
                     <p class="m-0 p-0" id="change_balance_cred">Balance:</p> 
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="change_cred" name="change_cred" class="form-control float-right" placeholder="0.00" style="height:40px;font-size:20px;font-weight:700;color:red;" disabled>
					 

				 
				
					  
					  </div> 
                  </div>
				  
			 
		</div>
			<div class="col-md-5 float-left" style="font-size:15px;font-weight:700;">  	
				 		<div class="form-group" > 
					<button id="100_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">100.00</button> 
					<button id="500_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">500.00</button> 
					<button id="1000_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">1,000</button> 
				 
					  					  	 
                  </div>  
				  <div class="form-group" > 
					<button id="10_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">10.00</button> 
					<button id="20_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">20.00</button> 
					<button id="50_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">50.00</button> 
				 
					  					  	 
                  </div>  
				  <div class="form-group" > 
					<button id="clear_cred" class="col-md-3 form-control float-right m-1 bg-danger" style="height:60px;">Clear</button> 
					<button id="1_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">1.00</button> 
					<button id="5_cred" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">5.00</button> 
				 
					  					  	 
                  </div>  
			</div>
		</div>
		<div class="col-md-12">
      <div class="modal-footer m-0 p-0"  >
        <button type="button" class="btn btn-primary col-md-7 float-left m-0" id="submit-credit">Submit Credit</button>
        <button type="button" class="btn btn-warning col-md-4 float-left" id="cancel" data-dismiss="modal" >Cancel</button>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>