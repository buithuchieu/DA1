
</style>
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Blog</p>
          <a href="index.php?act=addblog"><button>Thêm blog</button></a>
        </div>
        <section class="detail"> 
            <section class="detail-item">
            <img src="../../img/ad1.jpg" alt="">
                <table >
                    <tr>
                      <td>#</td>
                      <td>Tiêu đề </td>
                      <td>Hình</td>
                      <td>Nội dung 1</td>
                      <td>Nội dung 2</td>
                      <td>Ngày</td>
                      <td>Chức Năng</td>
                    </tr>
                  <?php
                   $i=0;
                    foreach($listblog as $blog){
                      $i+=1;
                      extract($blog);  
                      $xoablog='index.php?act=xoablog&idnew='.$idnew;
                      $anh= "../uploads/".$new_img;
                      if(is_file($anh)){
                        $anh='<img src="'.$anh.'" height="80px">';
                      }
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$name_new.'</td>              
                      <td>'.$anh.'</td>              
                      <td>'.$discription.'</td>              
                      <td>'.$discription_all.'</td>  
                      <td>'.$new_time.'</td>                   
                      <td>
                        <a href="'.$xoablog.'"><i class="fa-solid fa-trash"></i></a>
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