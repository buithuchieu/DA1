<style>
    h2{
        margin-left:230px;
        padding-top: 40px;
        color:red;
    }
</style>
    <section class="login-name">
        <section class="login-image">
            <img src="img/imagelogin.png" alt="">
        </section>
        <section class="login-username">
        <form action="index.php?act=dangky" method="post">
                <label for=""><strong>Đăng ký</strong></label>
                <input type="text" name="user" placeholder="Tên đăng nhập">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="address" placeholder="Địa chỉ">
                <input type="text" name="phone" placeholder="Số điện thoại">
                <input type="password" name="pass" placeholder="Mật khẩu">
                <!-- <input type="submit" value="Đăng ký" name="dangky"> -->
             <button value="Đăng kí" name="dangky" type="submit">Đăng ký</button>
            </form>
            <section class="items-login">
                <a href="index.php?act=quenmatkhau"><b>Quên mật khẩu?</b></a>
                <a href="index.php?act=login"><b>Đăng nhập</b></a>
            </section>
            <h2>
           <?php 
           if(isset($thongbao)&&($thongbao!="")){
             echo $thongbao;
                 }
           ?>
           </h2>
        </section>
    </section>

