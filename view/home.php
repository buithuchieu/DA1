<div class="banner" >
            <i class="fa-solid fa-circle-chevron-left" onclick="Pre()"></i>
            <img src="img/banner/banner0.png" alt="" id="banner">
            <i class="fa-solid fa-circle-chevron-right" onclick="Next()"></i>
        </div>
        <section class="danhmuc">
        <?php
                  foreach ( $dsdm_home as $dm) {
                    extract($dm);
                    echo '
                    <div class="dm">
                <a href="index.php?act=sanpham&&iddm='.$iddm.'"><strong '.$iddm.'>'.$name.'</strong></a>
            </div>
                    ';
                }
                ?>

        </section>
        <div class="tt">
            <h4>SẢN PHẨM MỚI</h4>
        </div>
        <section class="pro">
            <?php 
                foreach($spnew as $sp){
                    extract($sp);
                    $anh=$img_path.$img;
                    echo '<div class="pro-new">
                    <div class="pro-new-images">                    
                        <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><img src="'.$anh.'" alt=""></a>
                        <div class="buy">
                            <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><p>Mua hàng</p></a>
                        </div>
                    </div>
                    <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><p>'.$name_pro.'</p></a>
                    <p>'.$price.'đ</p>
                </div>';
                }
            ?>
            
            
        </section>
        <div class="tt">
            <h4>SẢN PHẨM BÁN CHẠY</h4>
        </div>
        <section class="pro">
            <?php
                foreach($sphot as $sp){
                    extract($sp);
                    $anh=$img_path.$img;
                    echo '<div class="pro-new">
                    <div class="pro-new-images">
                        <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><img src="'.$anh.'" alt=""></a>
                        <div class="buy">
                            <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><p>Mua hàng</p></a>
                        </div>
                    </div>
                    <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><p>'.$name_pro.'</p></a>
                    <p>'.$price.'đ</p>
                </div>';
                }
            ?>
        </section>
        <div class="infologo">
            <h3 >Thương hiệu nổi tiếng</h3>
            <p>Đồng hành cùng ©Polysneaker</p>
            <hr>
        </div>
        
        <section class="logonoitieng">
            <img src="img/a1.png" alt="">
            <img src="img/a2.png" alt="">
            <img src="img/a3.png" alt="">
            <img src="img/a4.png" alt="">
            <img src="img/a5.png" alt="">
            <img src="img/a6.png" alt="">
            <img src="img/a7.png" alt="">
        </section>
        <section class="people">
            <div class="people-info">
                <h1>Người nổi tiếng nói về chúng tôi </h1>
                <p>Cùng xem nhưng phải hồi từ khách hàng</p>
                <hr>
            </div>
            <div class="box-peole">
                <div class="people-item">
                    <img src="img/stmtp.jpg" alt="">
                    <p>Các thiết kế vô cùng độc đáo của ©Polysneaker , những sản phẩm rất đẹp</p>
                    <b>Sơn Tùng MTP</b>
                    <p>( Ca sĩ )</p>
                </div>
                <div class="people-item">
                    <img src="img/btran1.webp" alt="">
                    <p>Những sản phẩm mang những thiết kế riêng biệt </p>
                    <b>B Trần</b>
                    <p>( Diễn viên )</p>
                </div>
                <div class="people-item">
                    <img src="img/hieuthu2.webp" alt="">
                    <p>Các chi tiết trên giày làm rất tỉ mỉ , rất mềm mại , thu hút ánh nhìn</p>
                    <b>HIEUTHUHAI</b>
                    <p>( Ca sĩ )</p>
                </div>
                <div class="people-item">
                    <img src="img/erik.jpg" alt="">
                    <p>Sự đặc biệt của đôi giày chính là các họa tiết trên giày</p>
                    <b>Erik</b>
                    <p>( Ca sĩ )</p>
                </div>
            </div>
        </section>
        <hr>