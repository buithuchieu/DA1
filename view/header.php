
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="demo/style.css">
    <script src="script.js"></script>
    <title>Poly Sneaker</title>
</head>
<body>
    <section class="container">
        <header>
            <div class="login">
                <h3>Hệ thống cửa hàng Poly sneaker</h3>
                <div class="login-user">

                <?php 
                if ( !$_SESSION) {
                ?>
                    <a href="index.php?act=login">Đăng nhập</a>
                <?php 
                } 
                else{
                ?>
                    <a href="index.php?act=capnhat"><?=$_SESSION['user']['user']?></a>
                    <a href="index.php?act=dangxuat">Logout</a>
                     <?php
                        if ($_SESSION['user']['role']==1) {
                            ?>
                            <a href="admin/index.php">Admin</a>
                        <?php }
                        ?> 
                <?php
            }
            ?>
                    
                </div>
            </div>
            <div class="menu">
                <div class="logo">
                    <a href=""><img src="img/logo1.jpg" alt=""></a>
                </div>
                <div class="menu-search">
                    <nav>
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                        <?php 
                             foreach( $dsdm_header as $dm){
                                extract($dm);
                                echo'<li><a href="index.php?act=sanpham&&iddm='.$iddm.'">'.$name.'</a></li>';
                             }
                            ?>
                            <li><a href="index.php?act=new">Tin Tức</a></li>                        </ul>
                    </nav>
                </div>
                <div class="search">
                    <form action="index.php?act=sanpham" method="POST">
                        <input type="text" placeholder="Tìm kiếm" name="kyw">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="cart">
                    <?php
                        if (!$_SESSION) {
                        ?>
                        <a href="index.php?act=login"><i class="fa-solid fa-cart-shopping"></i></a>
                        <?php
                            }else{
                        ?>
                        <a href="index.php?act=listcart"><i class="fa-solid fa-cart-shopping"></i></a>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        </header>