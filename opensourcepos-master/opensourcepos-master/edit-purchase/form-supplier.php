       <div class="modal modal-supplier fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h5 class="modal-title">Select Supplier</h5> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
		  <div class="row mb-2">
							<div class="col-sm-10">
						 
					 <div class="card-tools float-left" style="margin-left:1.0rem;">
					  <div class="input-group input-group-sm" style="width:100%;padding-top:0.5rem;">
						   
						  <input type="text" name="table_search" class="form-control float-right" placeholder="Supplier name...">

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						  </button>
						</div>
				
					  
					  </div>
					</div>
							</div>
										
							</div>
<div id="tbl-supplier">	 
					<?php include_once('../database.php');?>
   <table class="table table-bordered table-hover" id="table_sup">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
             
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;" width="20">#</th>
                    <th style="border:none;"  >Supplier name</th> 
                    <th style="border:none;"  >Contact #</th> 
                    <th style="border:none;"  >Address</th>  	 
                    <th align="center" style="border:none;" width="20" align="left"></th>
               
                  </thead>
                  <tbody id="tblsupplier">  
					 
<?php include_once('../database.php');?>
  <?php
				  $total_allitem=0;
				  $grandtotal_allitem = 0;
				  $sql=mysqli_query($conn,"SELECT * FROM tblsupplier ");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;   
				  ?>
				 <tr class="p-1" style="font-size:0.9rem;font-family:verdana;">
					<td style="display:none;" class="p-1"><?php echo $row['supId'];?></td>
					<td class="p-1"><?php echo $qty;?></td>
					<td class="p-1"><?php echo $row['supname'];?></td>
					<td class="p-1"><?php echo $row['contact_number'];?></td>
					<td class="p-1"><?php echo $row['address'];?></td>
					 
					<td class="p-1">
					<span  id="btn-select-supplier"  class=" " data-dismiss="modal">
                    <i class="fas fa-check"></i>
                    </span>
					</td>
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
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>