
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


<main class="main-container">
        <p class="font-weight-bold">Thêm sản phẩm chi tiết</p>
      <form action="" id="formdata" method="post" enctype="multipart/form-data">
                
               <label>Size</label>
            <select name="size">
            <?php
              $listsize=loadall_size();
              foreach($listsize as $size){
                  extract($size);
                  echo '<option value="'.$idsize.'">'.$size.'</option>';
                }               
            ?> 
            </select>
            
               <label>Số lượng</label>
            <input type="text" name="soluong" placeholder="Số lượng ...">
        



            <div class="sm">
                    <input type="submit" name ="themmoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listspct"><input type="button" value="DANH SÁCH"></a>
                </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) 
                    echo $thongbao;   
            ?>
      </form>
      <?php 
      if (isset($_POST['themmoi'])) {
        $idsize=$_POST['size'];
        $soluong=$_POST['soluong'];

        echo $idsize;
        echo $soluong;
        
        $result = insert_ctsp($idPro,$idsize,$soluong);
        echo "<script>window.location='/DA1/admin/index.php?act=listspct&idpro=$idPro'</script>";
        header("Location:/DA1/admin/index.php?act=listspct&idpro=".$idPro);
      }

    ?>
</main>
<!-- <script>
  const formData = document.querySelector("#formdata");

  console.log(formData);
  formData.addEventListener(
            "submit",
            (event) => {
              event.preventDefault();
              const form = new FormData(formData);
              fetch("/",{
                method:"post",
                body:form
              })
            },
            false
          );
  console.log("hehe");
</script> -->
      <!-- End Main -->

    

    

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/scripts.js"></script>

    