<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Sản phẩm</p>
          <div class="cn">
          <a href="index.php?act=adddm"><button>Thêm danh mục</button></a>
          <a href="index.php?act=khodm"><button>Kho danh mục</button></a>
          </div>
        </div>
        <section class="detail">
            <h4>Danh mục sản phẩm</h4>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>Tên danh mục</td>
                      <td>Ngày tạo</td>
                      <td>Chức năng</td>
                      <td>Xóa mềm</td>
                    </tr>
                  <?php
                  $i=0;
                    foreach($listdanhmuc as $dm){
                      extract($dm);
                      $i+=1;
                      $suadm='index.php?act=suadm&iddm='.$iddm;
                      $xoadm='index.php?act=xoadm&iddm='.$iddm;
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$name.'</td>  
                      <td>'.$ngaytao.'</td>             
                      <td>
                        <a href="'.$suadm.'" ><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="'.$xoadm.'" onclick=" Delete()" ><i class="fa-solid fa-trash"></i></a>
                      </td>
                      <td><a href="index.php?act=xoamem&iddm='.$iddm.'"><i class="fa-solid fa-trash"></i></a></td>  
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
<script>
    function Delete(){
        return confirm("Bạn muốn xóa danh mục khỏi danh mục?");
    }

</script>