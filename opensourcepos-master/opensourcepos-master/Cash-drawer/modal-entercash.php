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
	<div class="modal modal-sale fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:32%;">
    <div class="modal-content" style="width:450px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">OPEN REGISTER (<?php echo date("m-d-Y")?>) </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <div class="row">
		<div class="col-md-12">
		 				<>
		</div> 
    </div>
    </div>
  </div>
</div>
</div>