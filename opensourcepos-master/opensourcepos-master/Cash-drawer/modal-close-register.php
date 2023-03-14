<script>
$(document).ready(function(){
	$('.close-table tbody').on('keyup','#thousand',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 1000;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});

	$('.close-table tbody').on('keyup','#five_hundred',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 500;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});
	

	$('.close-table tbody').on('keyup','#two_hundred',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 200;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});
	
	
	$('.close-table tbody').on('keyup','#one_hundred',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 100;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});

	
	$('.close-table tbody').on('keyup','#fifty',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 50;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});
	
	
	$('.close-table tbody').on('keyup','#twenty',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 20;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});
	
	$('.close-table tbody').on('keyup','#ten',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 10;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});
	
	
	$('.close-table tbody').on('keyup','#five',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 5;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});
	
	
	$('.close-table tbody').on('keyup','#one',function(){	
	var row=$(this).closest("tr"); //getting the selected row of table 
    var qty= parseFloat(row.find("td:eq(2) input").val()); 
	var total_cash = parseFloat($('#total_cash_drawer').val());
	var total = qty * 1;
	var grandtotal=0;
		if($('#total_cash_drawer').val()=='')
	{
		total_cash=0;
	}
	row.find("td:eq(3)").text(total); 
	var table = document.getElementById("close-table");
		for(var i = 1; i < table.rows.length; i++)
			{
				 
			grandtotal+=parseFloat(table.rows[i].cells[3].innerHTML);
			 
			}
			$('#total_cash_drawer').val(grandtotal.toFixed(2));
	
	});



	 
});
</script>

	<?php
	$item=1;
	$sql=mysqli_query($conn,"SELECT * FROM  tblholditem");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$item++;
		}
	}
	
	?>
	<div class="modal modal-closeregister fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:30%;">
    <div class="modal-content" style="width:550px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">CLOSE REGISTER (<?php echo date("m-d-Y")?>) </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <div class="row">
		<div class="col-md-12">
			<table >
				<thead>
				<th ></th>
				<th  ></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td width="240">Total cash</td>
				<td width="50">=</td>
				<td width="100">0.00</td>
				</tr> 
				</tbody>
			</table>				
		</div> 
				<div class="col-md-12">
			<table  class="close-table" id="close-table">
				<thead>
				<th width="240">Cash</th>
				<th width="50">x</th>
				<th width="100" >Qty</th>
				<th width="100" style="display:none;" >total</th>
				</thead>
				<tbody>
				 <tr>
				 <td>1,000.00</td>
				 <td>x</td>
				 <td><input id="thousand" class="form-control" type="number" value="0"></td>
				 <td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>500.00</td>
				 <td>x</td>
				 <td><input id="five_hundred" class="form-control" type="text" value="0"></td>
				<td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>200.00</td>
				 <td>x</td>
				 <td><input id="two_hundred"class="form-control" type="text" value="0"></td>
				 <td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>100.00</td>
				 <td>x</td>
				 <td><input id="one_hundred" class="form-control" type="text" value="0"></td>
				 <td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>50.00</td>
				 <td>x</td>
				 <td><input id="fifty" class="form-control" type="text" value="0"></td>
				 <td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>20.00</td>
				 <td>x</td>
				 <td><input id="twenty" class="form-control" type="text" value="0"></td>
				 <td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>10.00</td>
				 <td>x</td>
				 <td><input id="ten" class="form-control" type="text" value="0"></td>
				<td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>5.00</td>
				 <td>x</td>
				 <td><input id="five" class="form-control" type="text" value="0"></td>
				 <td style="display:none;">0</td>
				 </tr>
				  <tr>
				 <td>1.00</td>
				 <td>x</td>
				 <td><input id="one" class="form-control" type="text" value="0"></td>
				<td style="display:none;">0</td>
				 </tr>
				 
				 
				 
				 
				 
				 
				 
				 
				 
			 
			 
			  
				</tbody>
			</table>				
		</div> 
		<div class="col-md-12">
				<div class="form-group" >
                     <p class="m-0 p-0" id="change_balance">Actual Cash:</p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="total_cash_drawer" name="total_cash_drawer" class="form-control float-right" style="height:40px;font-size:20px;font-weight:700;" value="0">
					 

				 
				
					  
					  </div> 
                  </div>
		</div>
    </div>
    </div>
  </div>
</div>
</div>