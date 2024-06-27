<?php
    if (!$_SESSION) {?>
        <section class="product-detail">
<?php

extract($sanpham );

?>

            <div class="pro-img">
                <?php 
                    $img = $img_path . $img;
                    echo'<img src=" '.$img.'?>" alt="">'
                ?>
                
            </div>
            <div class="pro-detail">
                
                <h2><?php echo $name_pro ?></h2>
                
                <p>Mã sản phẩm : SP00<?php echo $idpro ?></p>
                <h3><?php echo $price ?>đ</h3>
                
                <div class="size">
                    <select name="size" id="">
                         <?php 
                            foreach($si1 as $sz){                            
                                echo '<option value="'.$sz['idsize'].'">'.$sz['size'].'</option>';                            
                            }
                            
                            ?>            
                    </select>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="quantity">
                    <!-- <span onclick="minus(1)"><i class="fa-solid fa-minus" ></i></span> -->
                    <input type="number" value="1" min="1" max="<?= $soluong?>" id="step" name="soluong">
                    <!-- <span onclick="plus(1)"><i class="fa-solid fa-plus" ></i></span> -->
                </div>
                <?php
                echo $soluong;
                ?>
                <div class="description">
                    <p><b>Mô tả</b><?php echo $mota ?></p>
                </div>
                    <button type="submit" name="addtocart">
                       
                        <a href="">Thêm vào giỏ hàng</a>
                    </button>
                </form>
                
            </div>
           
        </section>
    <?php }else{?>
        <form action="index.php?act=addcart&idpro=<?=$_GET['idpro']?>&iduser=<?=$_SESSION['user']['iduser']?>" method="POST">
<section class="product-detail">
<?php

 extract($sanpham ); 
?>

            <div class="pro-img">
                <?php 
                    $img = $img_path . $img;
                    echo'<img src=" '.$img.'?>" alt="">'
                ?>
                
            </div>
            <div class="pro-detail">
                
                <h2><?php echo $name_pro ?></h2>
                
                <p>Mã sản phẩm : 00<?php echo $idpro ?></p>
                <h3><?php echo $price ?>đ</h3>
                <div class="size">
                    <select name="size" id="">
                         <?php 
                            foreach($si1 as $sz){                            
                                echo '<option value="'.$sz['idsize'].'">'.$sz['size'].'</option>';                            
                            }
                            
                            ?>            
                    </select>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="quantity">
                    <!-- <span onclick="minus(1)"><i class="fa-solid fa-minus" ></i></span> -->
                    <input type="number" value="1" min="1" max="100" id="step" name="soluong">
                    <!-- <span onclick="plus(1)"><i class="fa-solid fa-plus" ></i></span> -->
                </div>
                <div class="description">
                    <p><?php echo $mota ?></p>
                </div>
                
                    <input type="hidden" name="img" value="<?=$img?>">
                    <input type="hidden" name="name_pro" value="<?=$name_pro?>">
                    <input type="hidden" name="price" value="<?=$price?>">
                    <input type="hidden" name="idpro" value="<?=$idpro?>">
                    <input type="hidden" name="total_price" value="<?=$total_price?>">
                    <button type="submit" name="addtocart">
                        Thêm vào giỏ hàng
                    </button>
                </form>
                <div class="saleqc">
                    <div class="qc">
                        <i class="fa-solid fa-fire"></i>
                        <h3>BLACK FRIDAY</h3>
                        <i class="fa-solid fa-fire"></i>
                        <h3>SIÊU SALE BOM TẤN</h3>
                    </div>
                    <div class="qc-item">
                        <div class="qc">
                            <i class="fa-solid fa-circle-check"></i>
                            <h4>Nhận hàng và kiểm tra trước khi thanh toán.</h4>
                        </div>
                        <div class="qc">
                            <i class="fa-solid fa-circle-check"></i>
                            <h4>Giao hàng nhanh 60 phút trong nội thành Hà Nội và TPHCM</h4>
                        </div>
                        <div class="qc">
                            <i class="fa-solid fa-circle-check"></i>
                            <h4>Hỗ Trợ đổi trả size linh hoạt</h4>
                        </div>
                    </div>
                </div>
                
            </div>
           
        </section>
    <?php
    }
?>

        <section class="bl">
            <h1>Bình luận</h1>
        </section>
        <section class="cmt">
            <?php
                foreach($binhluan as $bl){
                    extract($bl);?>
                <div class="cmt-pro">
                    
                    <?php
                        $avt = $img_path . $avatar;
                        echo'<img src="'.$avt.'" alt="">'
                    ?>
                
                <div class="usercmt">
                    <h2><?php echo $user?></h2>
                    <span><?php echo $ngaybinhluan?></span>
                </div>
                <p><?php echo $noidung?></p>
            </div> 
            <?php
                }
            ?>
        </section>
        <section class="cmt-form">
            <?php
            if (!$_SESSION) {
                ?>
                <div class="login2">
                    <a href="index.php?act=login">Đăng nhập để bình luận</a>
                </div>
                
            <?php 
                }
                else
                {
            ?>
                <form action="" method="POST">
                    <label for=""><b>Comment</b></label>
                    <input type="text" placeholder="Comment ..." name="noidung">
                    <input type="submit" value="Đăng" name="cmt">
                </form>
            <?php
            }
            ?>
            
        </section>
        <section class="similar">
            <h2>Một số sản phẩm cùng loại</h2>
            <section class="pro">
                <?php
                    foreach($spcl as $sp){
                        extract($sp);
                        $anh=$img_path.$img;
                        echo' <div class="pro-new">
                        <div class="pro-new-images">
                            <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><img src="'.$anh.'" alt=""></a>
                            <div class="buy">
                                <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><p>Mua hàng</p></a>
                            </div>
                        </div>
                        <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><p>'.$name_pro.'</p></a>
                        <p>'.$price.'$</p>
                    </div>';
                    }

                ?>  
            </section>
        </section>
        <hr>
<?php
    if (isset($_POST['cmt'])) {
        $idpro=$_GET['idpro'];
        $iduser=$_SESSION['user']['iduser'];
        $noidung=$_POST['noidung'];
        insert_binhluan($idpro, $noidung,$iduser);
        echo "<script>window.location='http://localhost/DA1/index.php?act=chitietsanpham&idpro=$idpro'</script>";
        header("Location:/DA1/index.php?act=chitietsanpham&idpro=$idpro");
    }
?>
<?php
    
?>