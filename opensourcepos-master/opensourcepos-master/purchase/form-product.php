       <div class="modal modal-select-product fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h5 class="modal-title">Select Product</h5> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
		  <div class="row mb-2">
							<div class="col-sm-10">
						 
					 <div class="card-tools float-left" style="margin-left:1.0rem;">
					  <div class="input-group input-group-sm" style="width:100%;padding-top:0.5rem;">
						   
						  <input type="text" name="table_search" class="form-control float-right" placeholder="Product code, name...">

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						  </button>
						</div>
				
					  
					  </div>
					</div>
							</div>
										
							</div>
<div id="tbl-product">	 
					<?php include_once('../database.php');?>
   <table class="table table-bordered table-hover" id="table_select-product">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
             
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;"  >Product Code</th> 
                    <th style="border:none;"  >Name</th> 
                    <th style="border:none;"  >Category</th>  	 
                    <th style="border:none;"  >Unit</th>  	 
                    <th style="border:none;"  >Cost</th>  	 
                    <th style="border:none;"  >Price</th>  	  
                    <th align="center" style="border:none;"> <i class="fas fa-check" style="padding-left:10px;"></i></th>
               
                  </thead>
                  <tbody id="tblsupplier">  
					 
<?php include_once('../database.php');?>
  <?php
				  $total_allitem=0;
				  $grandtotal_allitem = 0;
				  $sql=mysqli_query($conn,"SELECT * FROM tblproduct ");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;   
				  ?>
				 <tr>
					<td style="display:none;"><?php echo $row['productId'];?></td>
					<td><?php echo $qty;?></td>
					<td><?php echo $row['productcode'];?></td>
					<td><?php echo $row['proname'];?></td>
					<td>--</td>
					<td><?php echo $row['prounit'];?></td>
					<td><?php echo $row['cost'];?></td>
					<td><?php echo $row['price'];?></td>  
					 
					<td>
					<button  id="btn-select-product"  class="btn btn-default btn-sm" data-dismiss="modal">
                    <i class="fas fa-check"></i>
                    </button>
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