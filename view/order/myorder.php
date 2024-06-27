<style>
    
</style>
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
                <label for=""><h2>Đơn hàng của bạn</h2></label>
                <?php
                    foreach($load_mydh as $dh){                        
                        $load=load_myctdh($dh['iddonhang']);
                        extract($dh);

                        ?>
                        <h4>Chờ xác nhận</h4>
                <hr>

                <div class="order-infor">
                    <?php
                        foreach($load as $dh1){
                            extract($dh1);
                    ?>
                    <div class="order-item">
                        <div class="cc">
                        <?php
                    $img=$img_path.$img;
                    echo '<img src="'.$img.'" alt="">'
                    ?>
                            <div class="spxn">
                                <p><?php echo $name_pro?></p>
                                <p>Size : <?php echo $size?></p>
                                <p>Số lượng : <?php echo $soluong?></p>
                                <p><?php echo $price?>đ</p>
                            </div>
                        </div>
                        <div>
                            <p><?php echo $total_price?>đ</p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <hr>
                    <div class="pay-info">
                        
                        <p>Thành tiền: <?php echo $total_money?>đ</p>
                        <?php
                            if ($idpayod==2 or $idpayod==3) {?>
                                <p>Đã thanh toán: <?php echo $total_money?>đ</p>
                            <?php
                            }else {?>
                                 <p>Đã thanh toán: 0đ</p>
                                 
                            <?php
                            }
                        ?>
                        <?php
                            if ($idpayod==2 or $idpayod==3) {?>
                                <p>Tổng tiền: 0đ</p>
                                <a href="index.php?act=huydon&iddonhang=<?=$iddonhang?>" onclick="return Delete2()">Hủy đơn</a>
                            <?php
                            }else {?>
                                 <p>Tổng tiền: <?php echo $total_money?>đ</p>
                                 <a href="index.php?act=huydon&iddonhang=<?=$iddonhang?>" onclick="return Delete()">Hủy đơn</a>
                            <?php
                            }
                        ?>
                    </div>
                </div>
                <?php
                    }
                ?>
                
                

            </div>
        </section>
<hr>
<script>
    function Delete(){
        return confirm("Bạn muốn hủy bỏ đơn hàng ?");
        
    }
    function Delete2(){
        confirm("Bạn muốn hủy bỏ đơn hàng ?");
    }

</script>