<script>
$(document).ready(function(){
 
$('#1000').on('click',function(){
	var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+1000)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#500').on('click',function(){
		var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+500)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#100').on('click',function(){
	var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+100)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#50').on('click',function(){
	var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+50)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#20').on('click',function(){
	var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+20)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#10').on('click',function(){
	var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+10)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#5').on('click',function(){
	var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+5)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#1').on('click',function(){
	var amount=parseFloat($('#amountpaid').val());
	if($('#amountpaid').val()=='')
	{
		amount=0;
	}
	var cash = parseFloat(amount+1)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();
});
$('#clear').on('click',function(){
 
	var cash = parseFloat(0)
	$('#amountpaid').val(cash);
	$('#amountpaid').css("background-color","#fffb99");
	$('#amountpaid').trigger('keyup');
	$('#amountpaid').focus();		
});
$('#amountpaid').on('click',function(){
	if($(this).val()==0)
	{
		$(this).val('');
	}
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
	
	<div class="modal modal-payment fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Finalize payment </h6>
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
						<input type="text" id="f_total" name="f_total" class="form-control float-right" style="height:40px;font-size:20px;font-weight:700;" value="<?php echo $ftotal;?>"disabled>
                     <p class="m-0">Cash tender:</p>
					 <div class="input-group input-group-md m-0 p-0" >
						    
						  <input type="search" id="amountpaid" name="amountpaid" class="form-control float-right" placeholder="0.00" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
					 

						<div class="input-group-append">
						  <button type="submit" class="btn btn-success" id="btn-supplier">
							<i>&#8369;</i>
						  </button>
						</div>
				
					  
					  </div>
					  					  	 
                  </div>
				  					<div class="form-group" >
                     <p class="m-0 p-0" id="change_balance">Change:</p><legend class="float-left" style="color:red;font-size:0.8rem;display:none;" id="legend_payment">Note! Cannot process transaction unless totaly paid</legend>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="change" name="change" class="form-control float-right" placeholder="0.00" style="height:40px;font-size:20px;font-weight:700;" disabled>
					 

				 
				
					  
					  </div> 
                  </div>
				  
			 
		</div>
			<div class="col-md-5 float-left" style="font-size:15px;font-weight:700;">  	
				 		<div class="form-group" > 
					<button id="100" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">100.00</button> 
					<button id="500" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">500.00</button> 
					<button id="1000" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">1,000</button> 
				 
					  					  	 
                  </div>  
				  <div class="form-group" > 
					<button id="10" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">10.00</button> 
					<button id="20" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">20.00</button> 
					<button id="50" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">50.00</button> 
				 
					  					  	 
                  </div>  
				  <div class="form-group" > 
					<button id="clear" class="col-md-3 form-control float-right m-1 bg-danger" style="height:60px;">Clear</button> 
					<button id="1" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">1.00</button> 
					<button id="5" class="col-md-3 form-control float-right m-1 bg-success" style="height:60px;">5.00</button> 
				 
					  					  	 
                  </div>  
			</div>
		</div>
		<div class="col-md-12">
      <div class="modal-footer m-0 p-0"  >
        <button type="button" class="btn btn-primary col-md-7 float-left m-0" id="submitpayment">Submit payment</button>
        <button type="button" class="btn btn-warning col-md-4 float-left" id="cancel" data-dismiss="modal" >Cancel</button>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>