<?php
  if(is_array($new)){
      extract($new);
  }
         
?>
<hr>
<main class="blog_Detail">
    <?php
        $anh=$img_path.$new_img;
        echo'
        <div class="infor-new">
        <h1>'.$name_new.'</h1>
        <p>'.$new_time.'</p>
        </div>
        <p>'.$discription_all.'</p> 
        <a href=""><img src="'.$anh.'" alt=""></a></div>
        <p>'.$discription_all.'</p> 
        
        ';
    ?>
       </main>
<hr>
