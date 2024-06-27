<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Tài khoản</p>
          <div class="cn">
          <a href="index.php?act=khoban"><button>Kho ban</button></a>
          
          </div>
          
        </div>
        <section class="detail">
            <h4>Danh mục tài khoản</h4>
            <section class="detail-item">
                <table >
                    <tr>
                      <td>#</td>
                      <td>User</td>
                      <td>Tên người dùng</td>
                      <td>Avatar</td>
                      <td>Email</td>
                      <td>Address</td>
                      <td>Phone</td>
                      <td>Hoạt động</td>
                      <td>Chức năng</td>
                      <td>Cấm</td>
                    </tr>
                  <?php
                  $i=0;
                    foreach($listuser as $user){
                      extract($user);
                      $imgpath = "../uploads/".$avatar;
                      if(is_file($imgpath)){
                        $img="<img src='".$imgpath."' height='80'>";
                        }else{
                        $img = "no photo";
                        }
                      $i+=1;
                      $xoauser='index.php?act=xoauser&iduser='.$iduser;
                      $banuser='index.php?act=banuser&iduser='.$iduser;
                      if($role==1){
                        $role="Admin";
                      }else{
                        $role="Người dùng";
                      }
                      echo'<tr>
                      <td>'.$i.'</td>
                      <td>'.$user.'</td> 
                      <td>'.$name_user.'</td>
                      <td>'.$img.'</td> 
                      <td>'.$email.'</td> 
                      <td>'.$address.'</td> 
                      <td>'.$phone.'</td>
                      <td>'.$role.'</td>         
                      <td>
                        <a href="'.$xoauser.'"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      <td>
                        <a href="'.$banuser.'"><button>Ban</button></a>
                      </td>
                    </tr>';
                    }
                  
                  ?>  
                </table>
                
            </section>
        </section>
        <div class="main-cards">