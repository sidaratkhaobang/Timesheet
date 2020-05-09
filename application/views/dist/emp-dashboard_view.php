<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view('dist/_partials/sidebar_M');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Project</h4>
            </div>
            <div class="card-body">
              <span><?php echo $countPro; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Total hours</h4>
            <div class="card-header-action">
              <a href="#chartMouth" data-tab="chart-tab" class="btn active">Month</a>
              <a href="#chartYear" data-tab="chart-tab" class="btn">Year</a>
            </div>
          </div>
          <div class="card-body">
            <div class="chartYear" data-tab-group="chart-tab" id="chartYear">
              <canvas id="YearChart" width="400" height="150"></canvas>
            </div>
            <div class="chartMouth active" data-tab-group="chart-tab" id="chartMouth">
              <canvas id="myChart" width="400" height="150"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>

<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [{
        label: 'hours',
        data: [<?php echo $sumJan; ?>, <?php echo $sumFab; ?>, 240, <?php echo $sumMarch; ?>, 176, <?php echo $sumMay; ?>, <?php echo $sumJune; ?>, 0, 0, 0, 0, 0, 0],
        borderWidth: 2,
        backgroundColor: 'transparent',
        borderColor: 'rgba(254,86,83,.7)',
        borderWidth: 2.5,
        pointBackgroundColor: 'rgba(254,86,83,.7)',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: true
      },
      animation:{
        duration: '3000',
        easing: 'linear'  
      },
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      },
      
    }
  });

  var ctx = document.getElementById("YearChart").getContext('2d');
  var Chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["2019","2020", "2021", "2022", "2023", "2024", "2025"],
      datasets: [{
        label: 'hours',
        data: [2120,<?php echo $sum2020; ?>, 240, 176, 0],
        borderWidth: 2,
        backgroundColor: 'transparent',
        borderColor: 'rgba(63,82,227,.8)',
        borderWidth: 2.5,
        pointBackgroundColor: 'rgba(63,82,227,.8)',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: true
      },
      animation:{
        duration: '3000',
        easing: 'linear'  
      },
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            color: '#f2f2f2',
          },
          ticks: {
            beginAtZero: true,
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
</script>