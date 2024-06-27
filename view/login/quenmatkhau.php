<section class="login-name">
        <section class="login-image">
            <img src="img/imagelogin.png" alt="">
        </section>
        <section class="login-username">
            <form action="index.php?act=quenmatkhau" method="POST">
                <label for=""><strong>Quên mật khẩu</strong></label>                
                <input type="text" placeholder="Email" name="email">
                <button name="guiemail" type="submit">Gửi</button>
                <?php if(isset($sendMailMess) && $sendMailMess != ''){
                  echo $sendMailMess;
          } ?>
            </form> 
            <hr>
            <section class="items-login">
                <a href="index.php?act=login"><b>Đăng nhập</b></a>
                <a href="index.php?act=dangky"><b>Đăng ký tài khoản</b></a>
            </section>            
        </section>
    </section>