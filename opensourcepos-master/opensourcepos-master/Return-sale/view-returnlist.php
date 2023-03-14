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
</script>


                   <table   class="table table-bordered table-hover" id="tblunreturn" >
                  <thead class="p-0"style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
              
                    <th class="p-1" style="display: none;">hidden(productid)</th> 
                     <th  class="p-1" style="border:none;">#</th>
                    <th  class="p-1" style="border:none;">Barcode</th>
                    <th  class="p-1" style="border:none;">Productname</th>  
                    <th  class="p-1" style="border:none;">Unit</th>  
                    <th class="p-1" style="border:none;">Price</th>  
                    <th class="p-1" style="border:none;text-align:center;" width="120">Qty</th>    
                    <th class="p-1" style="border:none;" width="90">Subtotal</th>    
                     
                  </thead>
                  <tbody>
				   <?php include('table-unreturnitem.php');?>
				
				  
                  </tbody>
 

                </table>  