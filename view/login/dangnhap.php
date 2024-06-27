<?php
        if (isset($_POST['dangnhap'])) {
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            $login=check_login($user,$pass);
            
            if (is_array($login)) {
                
                header("Location:/DA1/index.php");
            }else{
                // echo $login;
            }
        }
        
    ?>
<style>
    h2{
        font-size:20px;
        padding-top:20px;
        text-align:center;
        color:red;
    }
</style>
<section class="login-name">
        <section class="login-image">
            <img src="img/imagelogin.png" alt="">
        </section>
        <section class="login-username">
            <form action="" method="POST">
                <label for=""><strong>Đăng nhập</strong></label>
                <input type="text" placeholder="Tên đăng nhập" name="user" id="dn">
                <span id="dnerror"></span>
                <input type="password" placeholder="Mật khẩu" name="pass" id="pass1">
                <span id=""></span>
                <button name="dangnhap" type="submit" onclick="check()">Đăng nhập</button>
            </form>
            
            <div class="check">
                <input type="checkbox">
                <p>Nhớ mật khẩu</p></p>
            </div>
            <section class="items-login">
                <a href="index.php?act=quenmatkhau"><b>Quên mật khẩu?</b></a>
                <a href="index.php?act=dangky"><b>Đăng ký tài khoản</b></a>
            </section>
            <?php
            if (isset($login) && $login!='') {
                echo "<h2>$login</h2>";
            }
            ?>
        </section>
        

    </section>
<script>
    function check(){
    var dn = document.querySelector('#dn');
    var pass1 = document.querySelector('#pass1');
    var dnerror = document.querySelector('#dnerror');
    var pass1error = document.querySelector('#pass1error');
    var checkTrue = true;
    dnerror.textContent = '';
    pass1error.textContent = '';
    if (dn.value == '') {
        checkTrue = false;
        dnerror.textContent = '*Tên đăng nhập không được bỏ trống'
    }
    if (pass1.value == '') {
        checkTrue = false;
        pass1error.textContent = '*Mật khẩu không được bỏ trống'
    }
    for (let i = 0; i < dn.value.length; i++) {
        if (dn.value[i] == ' ') {
            checkTrue=false;
            dnerror.textContent = '*Tên đăng nhập không được cách'
        }
    }
    for (let i = 0; i < pass1.value.length; i++) {
        if (pass1.value[i] == ' ') {
            checkTrue=false;
            pass1error.textContent = '*Mật khẩu không được cách'
        }
    }
    if (checkTrue == true) {
        alert('Đăng nhập thành công')
        dn.value == '';
        pass1.value == '';
    }
}
</script>

    