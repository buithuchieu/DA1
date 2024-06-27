<style>
  .main-container form select {
  width: 315px;
  height: 40px;
  outline:#ccc;
  border:1px solid #ccc;
  margin-top:20px;
}
form input{
  border:1px solid #ccc;
  outline:#ccc;
}
textarea{
  border:1px solid #ccc;
}
</style>
<?php 
if(is_array($sanpham)){
    extract($sanpham);
    }
    $hinhpath = "../uploads/".$img;
                      if(is_file($hinhpath)){
                    $hinh="<img src='".$hinhpath."' height='80'>";
                    }else{
                    $hinh = "no photo";
                    }
?>
<main class="main-container">
        <p class="font-weight-bold">Cập nhật sản phẩm</p>
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
        
            
                Danh mục <br>
            <select name="iddm">
            <?php
                    foreach($listdanhmuc as $danhmuc){
                      
                      ?>
                      <option <?php  
                        if($iddm == $danhmuc['iddm']) {echo "selected";}
                      ?> value="<?=$danhmuc['iddm']?>"><?=$danhmuc['name']?></option>
                      <?php
                    }
              
                ?>
            </select>
            
            <label>Tên sản phẩm</label>
            <input type="text" name="tensp" value="<?= $name_pro ?>">            
            <label>Giá</label>
            <input type="text" name="giasp" value="<?= $price ?>">            
            <label>Hình</label>
            <input type="file" name="hinh" value="<?= $hinh ?>">
            <label for="">Lượt xem</label>
            <input type="text" name="luotxem" value="<?= $luotxem ?>">
            <label>Mô tả</label>
            <textarea name="mota" cols="30" rows="10"><?= $mota ?></textarea>
            <div class="sm">
                   <input hidden name="idpro" value="<?= $idpro ?>">
                    <input type="submit" name ="capnhat" value="CẬP NHẬT">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                </div>
        <?php
            if (isset($thongbao) && ($thongbao!="")) 
                echo $thongbao;   
        ?>
          </form>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/scripts.js"></script>