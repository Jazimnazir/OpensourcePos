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
 
$('#cashonhand').keydown(function(e){
	if(e.keyCode == 13)
	{
		$('#submit').trigger('click');
		
	}
 
}); 
	$('#cashonhand').focus();
$('#submit').on('click',function(){
	var cashonhand=$('#cashonhand').val();
	$.ajax({
		url:'entercash.php',
		type:'POST',
		dataType:'json',
		data:
		{
			'insert':1,
			cashonhand:cashonhand
		},
		beforeSend:function()
		{
			$('#submit').text('Loading...');
		},
		success:function()
		{
			
			if(cashonhand == '' || cashonhand <0)
			{
				alert('Invalid Cash drawer');
			}else
			{
				window.location.href="../pos/index.php";
			}
		},
		error:function(error){
			alert(error);
		},
	});
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

if($_SESSION['label']=='CLOSE')
{
	echo "<script>	 Toast.fire({
        icon: 'success',
        title: 'Successfuly Closed Sales transaction, Thank you!'
      })</script>";
	  $_SESSION['label']='6';
}
?>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
		<div class="col-md-3">
		</div>
          <div class="col-md-7 p-1" >   <!-- /SIDE BAR PRODUCT CONTENT -->
            <div class="card" style="margin:100px;">
                <div class="card-body">
      <p class="login-box-msg">Cash Drawer</p>

        <div class="input-group mb-3 ">
          <input type="text" class="form-control" id="cashonhand" name="cashonhand" placeholder="Cash on hand" style="font-size:25px;height:50px;padding:10px;" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
   

      <div class="social-auth-links text-center mt-2 mb-3" style="padding-top:15px;">
        <button class="btn btn-block btn-primary" id="submit" >
          <i class="fa fa-"></i>Submit
        </button>
        
      </div>
      <!-- /.social-auth-links -->
 
      
    </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /	.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	<!--Modal for payment-->