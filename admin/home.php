<?php
// var_dump($tke);
?>
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">PRODUCTS</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $dem1['idpro'];?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">COMMENT</p>
              <span class="material-icons-outlined text-orange">comment</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $dem2['idbl'];?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ORDERS</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $dem4['iddonhang'];?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">USER</p>
              <span class="material-icons-outlined text-red">people</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $dem3['iduser'];?></span>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <p class="chart-title">Top 5 Sản phẩm</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">Doanh thu</p>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>
<?php
function chart()  {
  $conn = pdo_get_connection();
      for($i=0;$i < 7 ; $i++) { 
          $dt = new stdClass;
          $date = date('Y-m-d');
          $newdate = strtotime ( "-$i day" , strtotime ( $date ) ) ;
          $newdate = date ( 'Y-m-d' , $newdate );
          $sql = "SELECT COUNT(*) as 'count', SUM(total_money) as 'total' FROM donhang WHERE ngaydat like '%$newdate%' ";
          $query = $conn  -> query($sql);
          $result = $query -> fetchAll();
          $dt-> date = "$newdate";
          $dt -> count = $result[0]['count'];
          $dt -> sum = $result[0]['total'];
          $data[] = $dt;
          
          
      }
      return array_reverse($data);
  // header("Access-Control-Allow-Origin: *");
  // echo json_encode($data); 
                 
}
$li=chart();
// var_dump($li);

?>
    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->

    <script >
      // SIDEBAR TOGGLE

let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

// ---------- CHARTS ----------

// BAR CHART
var options = {
          series: [{
          name: 'Số tiền',
          type: 'column',
          data: [<?php
            foreach($tke as $tk){
              extract($tk);?>
              '<?php echo $sotien?>',
              <?php


            }
            
          ?>]
        }, {
          name: 'Số đơn',
          type: 'line',
          data: [<?php
            foreach($tke as $tk){
              extract($tk);?>
              '<?php echo $sodon?>',
              <?php


            }
            
          ?>]
        }],
          chart: {
          height: 350,
          type: 'line',
        },
        stroke: {
          width: [0, 4]
        },
        title: {
          text: 'Traffic Sources'
        },
        dataLabels: {
          enabled: true,
          enabledOnSeries: [1]
        },
        labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001'],
        xaxis: {
          categories: [
          <?php
            foreach($tke as $tk){
              extract($tk);?>
              '<?php echo $name_pro?>',
              <?php


            }
            
          ?>],
        },
        yaxis: [{
          title: {
            text: 'Số tiền',
          },
        
        }, {
          opposite: true,
          title: {
            text: 'Số đơn',
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#bar-chart"), options);
        chart.render();

// AREA CHART
const areaChartOptions = {
  series: [
    {
      name: 'Tổng tiền',
      data: [
        <?php
            foreach($li as $tk){
              
              ?>

              '<?php if($tk ->sum  )
              {echo $tk ->sum;}
              else{
                echo 0;
              }?>',
              <?php
            
            
            }
        ?>
        
      ],
    },
    {
      name: 'Đơn',
      data: [
        <?php
            foreach($li as $tk){
              
              ?>
              '<?php echo $tk ->count?>',
              <?php
            
            
            }
        ?>
      ],
    },
  ],
  chart: {
    height: 350,
    type: 'area',
    toolbar: {
      show: false,
    },
  },
  colors: ['#4f35a1', '#246dec'],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: 'smooth',
  },
  labels: [<?php
      foreach($li as $tk){
        ?>
        '<?php echo $tk ->date?>',
        <?php
      
      
      }
  
  ?>],
  markers: {
    size: 0,
  },
  yaxis: [
    {
      title: {
        text: 'Tổng tiền',
      },
    },
    {
      opposite: true,
      title: {
        text: 'Số đơn',
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
  },
};

const areaChart = new ApexCharts(
  document.querySelector('#area-chart'),
  areaChartOptions
);
areaChart.render();

    </script>
