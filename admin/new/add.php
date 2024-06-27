
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
button a{
  text-decoration: none;
}
</style>
<main class="main-container">
        <p class="font-weight-bold">Thêm blog</p>
        <form action="index.php?act=addblog" method="post" enctype="multipart/form-data">
               <label>Tên tiêu đề </label>
            <input type="text" name="name_new">  
               <label>Hình</label>
            <input type="file" name="hinh">
            <label>Nội dung 1</label>
            <textarea name="discription" cols="30" rows="10"></textarea>
               <label>Nội dung 2</label>
            <textarea name="discription_all" cols="30" rows="10"></textarea>
            <label>Ngày </label>
            <!-- <textarea name="new_time" cols="10" rows="10"></textarea> -->
            <input type="date" name="new_time" id="">
            <div class="sm">
                    <input type="submit" name ="themmoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <button style="width: 160px; height: 25px; background-color: black; border-radius: 20px ;">
                  <a href="index.php?act=listblog" style="color:aliceblue ">DANH SÁCH </a>
                  </button>
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