<hr>
        <section class="news">
            <section class="new-info">
                <h3>TIN TỨC MỚI NHẤT</h3>
                <p>Tất cả</p>
                <hr>
            </section>
            <section class="new-item">
                <?php
                    foreach($listnew as $new){
                        extract($new);
                        $img=$img_path.$new_img;
                        
                        echo '
                        <section class="new-item1">
                    <img src="'.$img.'" alt="">
                    <h4>'.$name_new.'</h4>
                    <p>'.$discription.'</p>
                    <p><i class="fa-solid fa-clock"></i>'.$new_time.'</p>
                    <a href="index.php?act=blog&idnew='.$idnew.'">Xem thêm</a>
                </section>';
                
                    }
                ?>
                
                <!-- <section class="new-item1">
                    <img src="../img/a1.png" alt="">
                    <h4>Tin tức mới nhất về thời trang , giày dép , những sản phẩm đẹp nhất</h4>
                    <p>Về nhưng tình huống đẹp t nên có nhưng vẻ đẹp mới nhất về vẻ đẹp</p>
                    <p>29/11/2023</p>
                    <a href="">Xem thêm</a>
                </section>
                <section class="new-item1">
                    <img src="../img/a1.png" alt="">
                    <h4>Tin tức mới nhất về thời trang , giày dép , những sản phẩm đẹp nhất</h4>
                    <p>Về nhưng tình huống đẹp t nên có nhưng vẻ đẹp mới nhất về vẻ đẹp</p>
                    <p>29/11/2023</p>
                    <a href="">Xem thêm</a>
                </section>
                <section class="new-item1">
                    <img src="../img/a1.png" alt="">
                    <h4>Tin tức mới nhất về thời trang , giày dép , những sản phẩm đẹp nhất</h4>
                    <p>Về nhưng tình huống đẹp t nên có nhưng vẻ đẹp mới nhất về vẻ đẹp</p>
                    <p>29/11/2023</p>
                    <a href="">Xem thêm</a>
                </section>
                <section class="new-item1">
                    <img src="../img/a1.png" alt="">
                    <h4>Tin tức mới nhất về thời trang , giày dép , những sản phẩm đẹp nhất</h4>
                    <p>Về nhưng tình huống đẹp t nên có nhưng vẻ đẹp mới nhất về vẻ đẹp</p>
                    <p><i class="fa-solid fa-clock"></i>29/11/2023</p>
                    <a href="">Xem thêm</a>
                </section>
                <section class="new-item1">
                    <img src="../img/a1.png" alt="">
                    <h4>Tin tức mới nhất về thời trang , giày dép , những sản phẩm đẹp nhất</h4>
                    <p>Về nhưng tình huống đẹp t nên có nhưng vẻ đẹp mới nhất về vẻ đẹp</p>
                    <p>29/11/2023</p>
                    <a href="">Xem thêm</a>
                </section> -->
            </section>
        </section>
        <hr>