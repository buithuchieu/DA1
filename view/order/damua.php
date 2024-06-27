
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
                    foreach($load_mydh3 as $dh){                        
                        $load=load_myctdh($dh['iddonhang']);
                        extract($dh);

                        ?>
                        <h4>Đã mua</h4>
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
                    </div>
                </div>
                <?php
                    }
                ?>
                
                

            </div>
        </section>
<hr>