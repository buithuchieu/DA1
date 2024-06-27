
<style>
  .main-container .detail form{
    display: flex;
    flex-direction:column;
  }
</style>
</style>
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Sản phẩm</p>
          <div class="cn">
            <a href="index.php?act=addsp"><button>Thêm sản phẩm</button></a>
            <a href="index.php?act=khosp"><button>Kho sản phẩm</button></a>
          </div>
          
        </div>
        <section class="detail">
            <h4>Danh mục sản phẩm</h4>
            <form action="" method="post">
                    <input type="text" name="kyw" placeholder="Tìm kiếm ...">
                    <select name="iddm" id="">
                <option value="0" selected>Tất cả</option>
                <?php
                    foreach($listdanhmuc as $danhmuc){
                      extract($danhmuc);
                      echo '<option value="'.$iddm.'">'.$name.'</option>';
                    };
                
                ?>
            </select>
                  <input  type="submit" name="listOk" value="Tìm kiếm">
                </form>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>Tên sản phẩm </td>
                      <td>Giá</td>
                      <td>Hình</td>
                      <td>Lượt xem</td>
                      <td>Mô tả</td>
                      <td>Loại</td>
                      <td>Chức Năng</td>
                      <td>Xóa mềm</td>
                      <td>Chi tiết sản phẩm</td>
                      
                    </tr>
                  <?php
                   $i=0;
                    foreach($listsanpham as $sanpham){
                     
                      $i+=1;
                      extract($sanpham);
                      $suasp='index.php?act=suasp&idpro='.$idpro;
                      $xoasp='index.php?act=xoasp&idpro='.$idpro;
                      $imgpath = "../uploads/".$img;
                      if(is_file($imgpath)){
                    $img="<img src='".$imgpath."' height='80'>";
                    }else{
                    $img = "no photo";
                    }
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$name_pro.'</td>              
                      <td>'.$price.'</td>              
                      <td>'.$img.'</td>              
                      <td>'.$luotxem.'</td>              
                      <td>'.$mota.'</td>
                      <td>'.$name.'</td>       
                      <td>
                        <a href="'.$suasp.'"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="'.$xoasp.'" onclick="return Delete()"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      <td><a href="index.php?act=xoamemsp&idpro='.$idpro.'"><i class="fa-solid fa-trash"></i></a></td>
                      <td><a href="index.php?act=listspct&idpro='.$idpro.'">Chi tiết sản phẩm</a></td>
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
        return confirm("Bạn muốn xóa sản phẩm ?");
    }

</script>