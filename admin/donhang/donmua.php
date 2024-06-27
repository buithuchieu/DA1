<?php
?>
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Đơn hàng</p>
        </div>
        <section class="detail">
            <h4>Đơn hàng</h4>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>Mã đơn</td>
                      <td>Người đặt hàng</td>
                      <td>Điện thoại</td>
                      <td>Địa chỉ</td>
                      <td>Ngày đặt</td>
                      <td>Tổng tiền</td>
                      <td>Quá trình</td>                    
                      <td>Chi tiết</td>
                    </tr>
                  <?php
                  $i=0;
                    foreach($listdh as $dh){
                      extract($dh);
                      if ($quatrinh==0) {
                        $qt="Chờ xác nhận";
                      }elseif($quatrinh==1){
                        $qt="Đã xác nhận";
                      }elseif($quatrinh==2){
                        $qt="Đang giao hàng";
                      }elseif($quatrinh==3){
                        $qt="Giao hàng thành công";
                      }
                      $i+=1;
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>DH'.$iddonhang.'</td>
                      <td>'.$name_user.'</td>
                      <td>'.$phone.'</td>
                      <td>'.$address.'</td>
                      <td>'.$ngaydat.'</td> 
                      <td>'.$total_money.'đ</td>
                      <td>'.$qt.'</td>           
                      <td>
                        <a href="index.php?act=donchitiet&iddonhang='.$iddonhang.'" ><i class="fa-solid fa-pen-to-square"></i></a>
                      </td>

                      
                    </tr>';
                    }
                  
                  ?>
                    
                    
                    
                </table>
                
            </section>
        </section>
        <div class="main-cards">

          

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/scripts.js"></script>