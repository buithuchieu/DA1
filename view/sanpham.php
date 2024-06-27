<section class="load-pro">
            <section class="dm2">
                <h4>Danh mục sản phẩm</h4>
                <br>
                <section class="listdm">
                    <?php 
                        foreach($dsdm as $dm){
                            extract($dm);
                            $linkdm = "index.php?act=sanpham&&iddm=".$iddm;
                            echo'<a href="'.$linkdm.'">'.$name.'</a>';
                        }   
                    ?>
                </section>
                <br>
                <h4>Lọc khoảng giá</h4>
                <form action="" method="POST">
                    <!-- <select name="price" id="">
                        <option value="selected">Tất cả </option>
                        <option value="1">100000-300000</option>
                        <option value="2">300000-500000</option>
                        <option value="3">500000-6000000</option>
                        <option value="4">600000-7000000</option>
                        <option value="5">700000-8000000</option>
                    
                    </select> -->
                    <button value="1" name="btn-price" type="submit"> < 300.000đ</button>
                    <button value="2" name="btn-price" type="submit">300.000đ - 500.000đ</button>
                    <button value="3" name="btn-price" type="submit">500.000đ - 600.000đ</button>
                    <button value="4" name="btn-price" type="submit">600.000đ - 700.000đ</button>
                    <button value="5" name="btn-price" type="submit">700.000đ ></button>
                </form>
                
            </section>
            <section class="load-name-pro">
                <h4><?=$tendm ?></h4>
                <section class="pro2">
                    <?php
                      foreach($dssp as $sp){
                        extract($sp);
                        $anh=$img_path.$img;
                   echo '<div class="pro-new">
                        <div class="pro-new-images">
                            <a href="index.php?act=chitietsanpham&idpro='.$idpro.'"><img src="'.$anh.'" alt=""></a>
                            <div class="buy">
                                <a href="index.php?act=chitietsanpham&idpro='.$idpro.'">
                                    <p>Mua hàng</p>
                                </a>
                            </div>
                        </div>
                        <a href="index.php?act=chitietsanpham&idpro='.$idpro.'">
                            <p>'.$name_pro.'</p>
                        </a>
                        <p>'.$price.'đ</p>
                    </div>';
                      }
                    ?>

                </section>
            </section>
        </section>
        <hr>