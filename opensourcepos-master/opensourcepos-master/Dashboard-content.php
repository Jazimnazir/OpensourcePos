<?php
unset($_POST);
include('database.php');
?>
 
<script src="plugins/export/src/jquery.table2excel.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(document).ready(function(){
 


});
</script>
 
 <div class="content-wrapper"  >
 
				                     
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding:1px;">
      <div class="container-fluid">
        <div class="row mb-2">
          
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
       <section class="content">
 
      <div class="container-fluid" style="margin-left:0px;">
              <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
				 <?php
					$totalsale=0;
					$sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE solddate='".date('m/d/Y')."'");
					while($row=mysqli_fetch_array($sql))
					{
						$totalsale+=$row['paid'];
					}
					
				 ?>
                <h3><?php echo number_format($totalsale,2,'.',',');?></h3>    

                <p>Total Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Today <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
			   				 <?php
					$totalexpense=0;
					$sql=mysqli_query($conn,"SELECT * FROM tblexpense WHERE dateofexp='".date('m/d/Y')."'");
					while($row=mysqli_fetch_array($sql))
					{
						$totalexpense+=$row['amount'];
					}
					
				 ?>
                  <h3><?php echo number_format($totalexpense,2,'.',',');?></h3>  

                <p>Total Expenses</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Today <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" style="color:white;">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
			   
                <h3>0.00</h3>

                <p>Total profit</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Today <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box"style="background:#ffc107;color:#ffff;">
              <div class="inner">
			    
                <h3>0.00</h3>

                <p>Out of stock</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Today <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
 
          <!-- ./col -->
		   <div class="col-md-8">
			 <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <p class="card-title" style="font-size:0.8rem;">Sales report (2022)</p>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">  
                  </p>
                  
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="monthly-sales" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
		   </div>
            <!-- /.card -->
        <!-- /////////////////.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
  let mychart = document.getElementById('monthly-sales').getContext('2d');
  
  let Popchart = new Chart(mychart, {
	  type:'bar',//bar,horizontanl,pie,dounut
	  data:{
		  labels:['JANUARY','FEBRUARY','MARCH'],
		  datasets:[{
			  label:'Population',
			  data:
			  [
				  50000,
				  110000,
				  120000,
				  
			  ]
			  
		  }]
	  },
	  
	  option:{
		  indexAxis: 'y'
	  }
  });
  </script>
 