<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$meta_title?></h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
               <li class="breadcrumb-item active"><?=$meta_title?></li>
            </ol>
         </div> <!-- /.col -->
      </div> <!-- /.row -->
   </div> <!-- /.container-fluid -->
</div> <!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-home"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Pending Order</span>
              <span class="info-box-number">150
              <!-- <?=number_format($dashboard_info['total_land'],4)?> Dec -->
              </span>
            </div> <!-- /.info-box-content -->
          </div> <!-- /.info-box -->
        </div> <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Delivery in last week</span>
              <span class="info-box-number">180
              <!-- <?=number_format($dashboard_info['total_land'],4)?> Dec -->
              </span>
            </div> <!-- /.info-box-content -->
          </div> <!-- /.info-box -->
        </div> <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Cancel in last week</span>
              <span class="info-box-number">12
              <!-- <?=number_format($dashboard_info['total_land'],4)?> Dec -->
              </span>
            </div> <!-- /.info-box-content -->
          </div> <!-- /.info-box -->
        </div> <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-info"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Items</span>
              <span class="info-box-number">812
              <!-- <?=number_format($dashboard_info['total_land'],4)?> Dec -->
              </span>
            </div> <!-- /.info-box-content -->
          </div> <!-- /.info-box -->
        </div> <!-- /.col -->
<!-- <?php
$classAll = array('danger','success','info','warning','primary','dark','secondary','danger','success','info','warning','primary','dark','secondary',);
foreach ($dashboard_info['property_type_land'] as $key => $value) { $cls = 'bg-'.$classAll[$key]; ?>
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon <?=$cls?> elevation-1"><i class="fas fa-thumbs-up"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text"><?=$value['type_name']?></span>
                  <span class="info-box-number">
                    <?=number_format($value['land_area'],4)?> Dec
                  </span>
               </div>
            </div>
         </div>
<?php } ?> -->

         <!-- fix for small devices only -->
         
      </div>
      <!-- /.row -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>
                    <!-- <?=$dashboard_info['total_project']?> -->500
                  </h3>                  
                  <p>Total Project</p>
               </div>
               <div class="icon"> <i class="ion ion-bag"></i></div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div> <!-- ./col -->
         <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
               <div class="inner">
                  <h3>
                    <!-- <?=$dashboard_info['total_property']?> -->600
                  </h3>
                  <p>Total Property</p>
               </div>
               <div class="icon"> <i class="ion ion-stats-bars"></i> </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div> <!-- ./col -->
         <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
               <div class="inner">
                  <h3>
                    <!-- <?=$dashboard_info['total_owner']?> -->150
                  </h3>
                  <p>Total User</p>
               </div>
               <div class="icon"> <i class="ion ion-person-add"></i> </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div> <!-- ./col -->
         <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
               <div class="inner">
                  <h3>
                    <!-- <?=$dashboard_info['total_ldt_property']?> -->930
                  </h3>
                  <p>Payable Property</p>
               </div>
               <div class="icon"> <i class="ion ion-pie-graph"></i> </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div> <!-- ./col -->
      </div> <!-- /.row -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-6 col-6">
            <!-- PIE CHART -->
            <div class="card card-danger">
               <div class="card-header">
                  <h3 class="card-title">Porperty Status</h3>
                  <div class="card-tools"> </div>
               </div>
               <div class="card-body">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
               </div> <!-- /.card-body -->
            </div> <!-- /.card -->
         </div> <!-- ./col -->
         <div class="col-lg-6 col-6">
            <!-- Bar chart -->
            <div class="card card-success">
               <div class="card-header">
                  <h3 class="card-title">
                     <!-- <i class="far fa-chart-bar"></i> -->
                     Project Wise Property (Decimal)
                  </h3>
                  <div class="card-tools">
                  </div>
               </div>
               <div class="card-body">
                  <div id="bar-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
               </div> <!-- /.card-body-->
            </div> <!-- /.card -->
         </div> <!-- /.col -->
      </div> <!-- /.row -->
   </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- page script -->
<script>
   $(function () {
      /* ChartJS
      * -------
      * Here we will create a few charts using ChartJS
      */

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.

      var donutData        = {
         labels: [
         'Leased', 
         'Mortgaged',
         'Rented',       
         'Sold', 
         ],
         datasets: [
         {
            data: [700,500,400,600],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
         }
         ]
      }
      

      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = donutData;
      var pieOptions     = {
         maintainAspectRatio : false,
         responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions      
      })

      /*
      * BAR CHART
      * ---------
      */

      var bar_data = {
        data : [[1,10], [2,8], [3,4], [4,13], [5,15], [6,9]],
        bars: { show: true }
      }
      $.plot('#bar-chart', [bar_data], {
        grid  : {
          borderWidth: 1,
          borderColor: '#f3f3f3',
          tickColor  : '#f3f3f3'
        },
        series: {
          bars: {
            show: true, barWidth: 0.4, align: 'center',
          },
        },
        colors: ['#3c8dbc'],
        xaxis : {
          ticks: [[1,'Project 1'], [2,'Project 2'], [3,'Project 3'], [4,'Project 4'], [5,'Project 5'], [6,'Project 6']]
        }
      })
      /* END BAR CHART */
   })
</script>

