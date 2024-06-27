<?php
    if (is_array($dm)) {
        extract($dm);
    }
?>
<main class="main-container">
        <p class="font-weight-bold">Danh mục</p>
        <form action="index.php?act=update" method="POST">
            <label for="">Tên danh mục</label>
            <input type="text" placeholder="Tên danh mục ..." name="name" value="<?php if(isset($name) && $name!="") echo $name;?>">
            <div class="sm">
                <input  type="submit" name="capnhat"value="CẬP NHẬT">
                <a href="index.php?act=listdm"><input   type="button" value="DANH SÁCH"></a>
            </div>
            <input type="hidden" name="iddm" value="<?php if(isset($iddm) && $iddm!=0) echo $iddm;?>">
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