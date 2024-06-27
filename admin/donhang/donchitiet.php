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
                      <td>Tên sản phẩm</td>
                      <td>Ảnh</td>
                      <td>Số lượng</td>
                      <td>Size</td>
                      <td>Giá</td>
                      <td>Tổng tiền</td>                      
                    </tr>
                  <?php
                  $i=0;
                    foreach($listctdh as $dh){
                      extract($dh);
                      
                      $imgpath = "../uploads/".$img;
                      if(is_file($imgpath)){
                        $img="<img src='".$imgpath."' height='80'>";
                        }else{
                        $img = "no photo";
                        }
                      $i+=1;
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$name_pro.'</td>
                      <td>'.$img.'</td>
                      <td>'.$soluong.'</td>
                      <td>'.$size.'</td>
                      <td>'.$price.'</td>
                      <td>'.$total_price.'đ</td>
                         
                      <td>
                        <a href="index.php?act=update1?act" ><i class="fa-solid fa-pen-to-square"></i></a>
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