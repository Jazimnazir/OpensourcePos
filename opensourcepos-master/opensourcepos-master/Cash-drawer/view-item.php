<script>
$(document).ready(function(){
	$('.btn-product_two').on('click',function(){
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
		if(status=="nostock")
			{
				alert('Sorry! please check available stock');
			} 
		$('#tblsalecart').load('table-salecart.php');
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
		return false;
	});
})	;		 
</script>			 
			 <?php
			   include('../database.php');

				if(!(isset($_POST['category'])))
				{
					 				$sql=mysqli_query($conn,"SELECT * FROM tblinventory GROUP BY productcode");
				if(mysqli_num_rows($sql)>0)
				{
						while($row=mysqli_fetch_array($sql))
						{
							echo "<button class='btn btn-app bg-default p-0 m-0 btn-product' style='width:100px;height:100px;font-size:15px;font-size:0.8rem;font-weight:700;' data-id='".$row['productcode']."'>".$row['productname']."</button> ";
							
							}
				}
				}else
				{
									$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE category='".$_POST['category']."'GROUP BY productcode");
				if(mysqli_num_rows($sql)>0)
				{
						while($row=mysqli_fetch_array($sql))
						{
							echo "<button class='btn btn-app bg-default p-0 m-0 btn-product_two' style='width:100px;height:100px;font-size:15px;font-size:0.8rem;font-weight:700;' data-id='".$row['productcode']."'>".$row['productname']."</button> ";
							
							}
				}
				}	
			   
 
			 
			  ?>