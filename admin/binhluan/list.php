<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Bình luận</p>
         
        </div>
        <section class="detail">
            <h4>Danh sách bình luận</h4>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>User</td>
                      <td>Tên sản phẩm</td>
                      <td>Ảnh sản phẩm</td>
                      <td>Nội dung</td>
                      <td>Ngày bình luận</td>
                      <td>Xóa mềm</td>
                      <td>Chức năng</td>
                      
                      
                      
                    </tr>
                  <?php
                    $i=0;
                    foreach($dsbinhluan as $binhluan){
                      extract($binhluan);
                      $i+=1;
                      $xoabl='index.php?act=xoabl&idcmt='.$idcmt;
                      $imgpath = "../uploads/".$img;
                      if(is_file($imgpath)){
                    $img="<img src='".$imgpath."' height='80'>";
                    }else{
                    $img = "no photo";
                    }
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$user.'</td>                
                      <td>'.$name_pro.'</td>              
                      <td>'.$img.'</td>              
                      <td>'.$noidung.'</td>              
                      <td>'.$ngaybinhluan.'</td> 
                      <td><a href="index.php?act=xoamemcmt&idcmt='.$idcmt.'" ><i class="fa-solid fa-trash"></i></a></td>        
                      <td>             
                        <a href="'.$xoabl.'" onclick="return Delete()"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>';
                    }
                  
                  ?>
                    
                    
                    
                </table>
                
            </section>
        </section>
        <div class="main-cards">
        <script>
    function Delete(){
        return confirm("Bạn muốn xóa bình luận?");
    }

</script>

          

    