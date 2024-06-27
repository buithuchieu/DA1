<?php
        if (is_array($_SESSION['user'])) {
            extract($_SESSION['user']);
        }
        $avatarpath = "../uploads/".$avatar;
                      if(is_file($avatarpath)){
                    $avt="<img src='".$avatarpath."'>";
                    }
    ?>
<hr>
        <section class="infor-user">
            <div class="infor-user-item">
                <a href="index.php?act=myorder&iduser=<?=$_SESSION['user']['iduser']?>">Đơn hàng</a>
                <a href="index.php?act=xacnhan&iduser=<?=$_SESSION['user']['iduser']?>">Đã xác nhận</a>
                <a href="index.php?act=vanchuyen&iduser=<?=$_SESSION['user']['iduser']?>">Đang vận chuyển</a>
                <a href="index.php?act=damua&iduser=<?=$_SESSION['user']['iduser']?>">Đã mua</a>
                <a href="index.php?act=capnhat">Thông tin người dùng</a>
            </div>
            <div class="information">
                <label for=""><h2>Thông tin người dùng</h2></label>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="user" placeholder="Tên đăng nhập" value="<?=$user?>">
                    <input type="text" name="name_user" placeholder="Họ và tên" value="<?=$name_user?>">
                    <input type="text" name="address" placeholder="Địa chỉ" value="<?=$address?>">
                    <input type="text" name="email" value="<?=$email?>">
                    <input type="text" name="phone" placeholder="Số điện thoại"value="<?=$phone?>">
                    <input type="text" name="pass"placeholder="Mật khẩu"value="<?=$pass?>">
                    <input type="file" name="avatar" value="<?=$avt?>">
                    <input type="hidden" name="iduser"value="<?=$iduser?>" >
                    <button name="capnhat" type="submit">Thay đổi</button>
                </form>

            </div>
        </section>
<hr>
<?php
    if (isset($_POST['capnhat']) ) {
        $iduser=$_POST['iduser'];
        $name_user=$_POST['name_user'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $avatar = $_FILES['avatar']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        if(move_uploaded_file($_FILES["avatar"]["tmp_name"],$target_file)) {
                        //
        }else{
                       //
        }
        update_taikhoan($iduser,$user,$pass,$email,$address,$phone,$avatar,$name_user);
        $login = check_login($_POST['user'], $_POST['pass']);
        $thongbao="Cập nhật  thành công";
        header("Location:/DA1/index.php?act=capnhat");
        
    }

?>