<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Bình luận</p>
         
        </div>
        <section class="detail">
            <h4>Danh sách bình luận</h4>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>Tên sản phẩm</td>
                      <td>Ảnh sản phẩm</td>
                      <td>Số bình luận</td>
                        <td>Xem bình luận</td>
                      
                      
                      
                    </tr>
                  <?php
                    $i=0;
                    foreach($tkbl as $binhluan){
                      extract($binhluan);
                      $i+=1;
                      $xoabl='index.php?act=xoabl&idcmt=';
                      $imgpath = "../uploads/".$img;
                      if(is_file($imgpath)){
                    $img="<img src='".$imgpath."' height='80'>";
                    }else{
                    $img = "no photo";
                    }
                      echo'<tr>
                      <td>'.$i.'</td>               
                      <td>'.$name_pro.'</td>              
                      <td>'.$img.'</td>              
                      <td>'.$sobinhluan.'</td>               
                      <td><a href="index.php?act=listbinhluan&idpro='.$idpro.'" ><i class="fa-solid fa-pen-to-square"></i></a></td>        
                    </tr>';
                    }
                  
                  ?>
                    
                    
                                 
                </table>
                <div id="piechart_3d" style="width: 650px; height: 500px;"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Sản phẩm', 'Số lượng bình luận'],
            <?php
            foreach($tkbl as $binhluan){
              extract($binhluan);
              echo "['$name_pro',$sobinhluan],";
            }
            ?>       
        ]);

        var options = {
          title: 'Thống kê',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
</script>
                
            </section>
            
        </section>
        
        <div class="main-cards">
        <!-- <script>
    function Delete(){
        return confirm("Bạn muốn xóa bình luận?");
    }

</script> -->



          

    