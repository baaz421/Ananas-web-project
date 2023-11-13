<?php
include 'header.php';
?>

<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Dashboard</h2>
    </div>
  </header>
  <!-- Dashboard Counts Section-->
  <section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
      <div class="row bg-white text-center">
        <h1 class="w-100 font-weight-light">All Runing Deals</h1>
      </div>
      <div class="row bg-white has-shadow">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-danger"><i class="bi bi-arrow-clockwise text-white"></i></div>
            <div class="title"><span>Red<br>Zone</span>
            </div>
            <div class="number" id="red"><strong></strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-warning"><i class="bi bi-arrow-clockwise text-white"></i></div>
            <div class="title"><span>Orange<br>zone</span>
            </div>
            <div class="number" id="orange"><strong></strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-success"><i class="bi bi-arrow-clockwise text-white"></i></div>
            <div class="title"><span>Green<br>zone</span>
            </div>
            <div class="number" id="green"><strong></strong></div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-success"><i class="bi bi-check-circle text-white"></i></div>
            <div class="title"><span>Completed<br>Deals</span>
            </div>
            <div class="number" id="Completed"><strong></strong></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Dashboard Header Section    -->
  <section class="dashboard-header">
    <div class="container-fluid">
      <div class="row">
        <!-- Statistics -->
        <div class="statistics col-lg-3 col-12">
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-primary"><i class="fa fa-tasks"></i></div>
            <div class="text" id="total-deals"><strong></strong><br><small>Total Deals</small></div>
          </div>
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-danger"><i class="bi bi-dash-circle"></i></div>
            <div class="text" id="total-failed"><strong>152</strong><br><small>Failed Deals</small></div>
          </div>
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-warning"><i class="bi bi-x-octagon"></i></div>
            <div class="text" id="total-canceled"><strong>147</strong><br><small>Canceled Deals</small></div>
          </div>
        </div>
        <!-- Line Chart            -->
        <div class="chart col-lg-6 col-12">
          <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
            <canvas id="lineCahrt"></canvas>
          </div>
        </div>
        <div class="chart col-lg-3 col-12">
          <!-- Bar Chart   -->
          <div class="bar-chart has-shadow bg-white">
            <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server Uptime</small></div>
            <canvas id="barChartHome"></canvas>
          </div>
          <!-- Numbers-->
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
            <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Client Section-->
  <section class="client no-padding-top">
    <div class="container-fluid">
      <div class="row">
        <!-- Work Amount  -->
        <div class="col-lg-4">
          <div class="work-amount card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-body">
              <h3>Work Hours</h3><small>Lorem ipsum dolor sit amet.</small>
              <div class="chart text-center">
                <div class="text"><strong>90</strong><br><span>Hours</span></div>
                <canvas id="pieChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Client Profile -->
        <div class="col-lg-4">
          <div class="client card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-body text-center">
              <div class="client-avatar"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                <div class="status bg-green"></div>
              </div>
              <div class="client-title">
                <h3>Jason Doe</h3><span>Web Developer</span><a href="#">Follow</a>
              </div>
              <div class="client-info">
                <div class="row">
                  <div class="col-4"><strong>20</strong><br><small>Photos</small></div>
                  <div class="col-4"><strong>54</strong><br><small>Videos</small></div>
                  <div class="col-4"><strong>235</strong><br><small>Tasks</small></div>
                </div>
              </div>
              <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
            </div>
          </div>
        </div>
        <!-- Total Overdue             -->
        <div class="col-lg-4">
          <div class="overdue card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-body">
              <h3>Total Overdue</h3><small>Lorem ipsum dolor sit amet.</small>
              <div class="number text-center">$20,000</div>
              <div class="chart">
                <canvas id="lineChart1">                               </canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Page Footer-->
  <footer class="main-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <p>Ananas &copy; <?php echo date('Y',strtotime($date)); ?></p>
        </div>
        <div class="col-sm-6 text-right">
          <p>Design by <a href="#" class="external">BAAZ DESIGNER</a></p>
        </div>
      </div>
    </div>
  </footer>
</div>
<?php
$x = 1;
$y = [];
while($x <= 12){
  $y[] = $x;
  $x++;
}
$a = json_encode($y);
// echo $a;
?>

<?php
include 'footer.php';
?>
<script type="text/javascript">

  var labelRed    = "Failed";
  var labelOrange = "Cancelled";
  var labelGreen  = "Completed";
  // var line_chart_label = <?php echo $a; ?>;
  var line_chart_label = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
  var line_chart_red_data =    [0,0,10];
  var line_chart_orange_data = [0,0,2];
  var line_chart_green_data =  [0,0,5];

</script>
<script type="text/javascript">
$(document).ready(function(){
  function loadRunningDeals(){
    $.ajax({
      url: "dashboard-ajax/running-deals.php",
      success: function(data){
        console.log(data);
        var array_data = JSON.parse(data);
        $("#red strong").text(array_data.red);
        $("#orange strong").text(array_data.orange);
        $("#green strong").text(array_data.green);
        $("#Completed strong").text(array_data.totalCompleted);

        $("#total-deals strong").text(array_data.totalDeals);        
        $("#total-failed strong").text(array_data.totalFailed);
        $("#total-canceled strong").text(array_data.totalCanceled);


      }
    });
  }
  loadRunningDeals();
})
</script>