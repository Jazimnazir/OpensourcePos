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
	<div class="modal modal-hold fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:32%;">
    <div class="modal-content" style="width:450px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Hold item </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <div class="row">
		<div class="col-md-12">
					<div class="col-md-12 float-left">
					<div class="form-group" >
                     <p class="m-0">Reference:</p>
					 <div class="input-group input-group-md m-0 p-0" > 
						  <input type="search" id="holdname" name="holdname" class="form-control float-right" value="<?php echo 'HOLD-No.-'.$item;?>"  >
					 

						<div class="input-group-append">
						  <button type="submit" class="btn btn-primary" id="btn-supplier">
							<i>&#8369;</i>
						  </button>
						</div>
				
					  
					  </div>
					  					  	 
                  </div>
 
		</div>
 
		</div>
		<div class="col-md-12">
      <div class="modal-footer" style="padding:1px;">
        <button type="button" class="btn btn-primary" id="submit-hold" style="margin:5px;width:100%;"  data-dismiss="modal">Hold item</button>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>