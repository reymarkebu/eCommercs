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
     <h2> Welcome, Beximco Land Management System </h2>
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
               show: true, barWidth: 0.5, align: 'center',
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

