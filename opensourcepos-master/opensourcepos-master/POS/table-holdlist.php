	<div class="modal modal-holdlist fade" id="tbl-payment" tabindex="-1" role="dialog" style="max-height:600px;">
  <div class="modal-dialog" role="document" style="margin-left:25%;">
    <div class="modal-content" style="width:600px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Select Item hold</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;opacity:0.7;">
			                   <table id="tblcourse" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                 <thead style="background:black;color:white;font-size:10px;">
    <tr>
	<th class="th-md" style="display:none;">ID# HIDDEN
      </th>
	  	  	  <th class="th-md">Hold date
      </th> 
	<th class="th-md">Reference ID 
      </th> 
 
	  <th class="th-md">Total Item(s)
      </th>
	  	  <th class="th-md">Subtotal
      </th>    
    </tr>
  </thead>
                  <tbody id="tblholdlist">
				 <?php 
				 include_once('../database.php');
				 
				 $sql=mysqli_query($conn,"SELECT * FROM tblholditem GROUP BY holdname ORDER BY date DESC");
				 if(mysqli_num_rows($sql)>0)
				 {
					  
					   
					 while($row=mysqli_fetch_array($sql))
					 { 
				 $item=0;
					 $subtotal=0;
						  $sql1=mysqli_query($conn,"SELECT * FROM tblholditem WHERE holdname='".$row['holdname']."'");
						  while($row1=mysqli_fetch_array($sql1))
						  {
							  $item+=$row['qty'];
							  $subtotal+=$row['subtotal'];
							  
						  }
				 ?>
				 <tr> 
					<td style="display:none;"><?php echo $row['holdname'];?></td>
					<td><?php echo $row['date'];?></td>
					<td><?php echo $row['holdname'];?></td>
					<td><?php echo number_format( $item,2,'.',',');?></td>
					<td><?php echo number_format($subtotal,2,'.',',');?></td>
				 </tr>
				 
				 <?php
				 
					 }
				 }
				 ?>
                  </tbody>
                   
                </table>

					
      </div>

 
    </div>
  </div>
</div>