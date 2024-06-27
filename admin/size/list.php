<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Size</p>
          <a href="index.php?act=addsize"><button>Thêm size</button></a>
        </div>
        <section class="detail">
            <h4>Danh mục size</h4>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>Tên size</td>
                      <td>Chức năng</td>
                    </tr>
                  <?php
                  $i=0;
                    foreach($listsize as $size){
                      extract($size);
                      $i+=1;
                      $suasize='index.php?act=suasize&idsize='.$idsize;
                      $xoasize='index.php?act=xoasize&idsize='.$idsize;
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$size.'</td>              
                      <td>
                        <a href="'.$suasize.'"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="'.$xoasize.'" onclick="return Delete()"><i class="fa-solid fa-trash"></i></a>
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
        return confirm("Bạn muốn xóa size khỏi size?");
    }

</script>