<main class="main-container">
        <p class="font-weight-bold">Thêm Danh mục</p>
        <form action="" method="POST">
            <label for="">Tên danh mục</label>
            <input type="text" placeholder="Tên danh mục ..." name="name">
            <div class="sm">
                <input  type="submit" name="themmoi"value="THÊM MỚI">
                <a href="index.php?act=listdm"><input   type="button" value="DANH SÁCH"></a>
            </div>
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