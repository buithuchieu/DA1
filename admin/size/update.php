<?php
    if (is_array($size)) {
        extract($size);
    }
?>
<main class="main-container">
        <p class="font-weight-bold">Size</p>
        <form action="index.php?act=update_size" method="POST">
            <label for="">Tên size</label>
            <input type="text" placeholder="Tên size ..." name="size" value="<?php if(isset($size) && $size!="") echo $size;?>">
            <div class="sm">
                <input  type="submit" name="capnhat"value="CẬP NHẬT">
                <a href="index.php?act=listsize"><input type="button" value="DANH SÁCH"></a>
            </div>
            <input type="hidden" name="idsize" value="<?php if(isset($idsize) && $idsize!=0) echo $idsize;?>">
        </form>
            <div class="main-cards">
        <?php
            if (isset($thongbao)) {
                echo $thongbao;
            }
        ?>
          

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/scripts.js"></script>