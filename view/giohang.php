<style>
    .total-money p{
        font-size:20px;
        margin-bottom:15px;
    }
    .quantity p{
        margin-left:15px;
    }
    .pro-cart a{
        color:black;
    }
</style>
<hr>
        <section class="cart1">
            <h1>Giỏ hàng của bạn</h1>
            
            <section class="pro-info">
                <p>Ảnh</p>
                <p>Tên</p>
                <p>Giá</p>
                <p>Số lượng</p>
                <p>Thành tiền</p>
            </section>
            <hr>
            <?php
                $total_money=0;
                $tt=0;
                $ship=0;
                foreach($listcart as $cart){  
                    // var_dump($cart);
                    extract($cart);

                    (int)$total_price=(int)$cart['soluong']*(int)$cart['price'];
                    $ship=10000;
                    $total_money += (int)$total_price;
                    $tt=$total_money+$ship;
                    ?>
                    <section class="pro-cart">
                <?php
                    $img=$img_path.$img;
                    echo '<img src="'.$img.'" alt="">'
                ?>
                
                <div>
                    <h4><?php echo $name_pro ?>  </h4><br>
                    <p>Size <?php echo $size ?></p>
                </div>
                <div class="pr">
                    <p><?php echo $price?></p>
                </div>
                <div class="quantity">
                    <p><?php echo $soluong ?></p>
                    <!-- <span ><i class="fa-solid fa-minus" ></i></span> -->
                    <!-- <input type="number" value="" min="1" > -->
                    <!-- <span ><i class="fa-solid fa-plus" ></i></span> -->
                </div>
                <div class="money">
                    <p><?php echo $total_price ?></p>
                </div>

                <a href="index.php?act=delete_cart&idchitietgh=<?=$idchitietgh?>" onclick="return Delete()"><i class="fa-solid fa-trash"></i></a>
            </section>
            <hr>
            <?php
                }

                echo '<section class="total-money">
                <p>Tổng đơn : '.$total_money.'đ</p>
                <p>Ship : '.$ship.'đ</p>
                
                <h2>Tổng tiền : '.$tt.'$</h2>
                
                <button>
                    <a href="index.php?act=muahang&iduser='.$_SESSION['user']['iduser'].'">Tiến hành đặt hàng</a>
                </button>
                
            </section>';
            ?>
            
            
        </section>
        <hr>
<?php
    // if (isset($_GET['idchitietgiohang']) && $_GET['idchitietgiohang'] && $_GET['iduser']) {
    //     delete_cart($_GET['idchitietgiohang']);
    // }
    // header("Location:/DA1/index.php?act=listcart&iduser=".$_GET['iduser']);

?>
<script>
    function Delete(){
        return confirm("Bạn muốn xóa sản phẩm khỏi giỏ hàng?");
    }

</script>