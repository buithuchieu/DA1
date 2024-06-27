<?php
    include "model/pdo.php";    
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/size.php";
    include "model/taikhoan.php";
    include "model/binhluan.php";
    include "model/giohang.php";
    include "model/donhang.php";
    include "model/new.php";
    include "global.php";
    include "vnpay/vnpay.php";
    include "MoMo/demoMoMo.php";
    $dsdm_header=loadall_danhmuc_header();
    include "view/header.php";
    $dsdm_home=loadall_danhmuc_home();
    $spnew=load8sp_new();
    $sphot=load8sp_hot();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            // Trang chi tiết sản phẩm 
            case "sanpham":
                if(isset($_POST['kyw'])&& $_POST['kyw']!=""){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw="";
                }
                if(isset($_GET['iddm'])&& $_GET['iddm']>0){
                    $iddm = $_GET['iddm'];
                     
                }else{
                      $iddm=0;
                }
                if(isset($_POST['btn-price']) && $_POST['btn-price']>0){
                    $price=$_POST['btn-price']; 
                }else{
                    $price=0;
                }
                
                $dssp = load_all_sanpham($kyw,$iddm,$price);
                $tendm = load_ten_dm($iddm);
                $dsdm=load_all_danhmuc();
                include "view/sanpham.php";   
                break; 
            case "chitietsanpham":
                if (isset($_GET['idpro']) && $_GET['idpro'] >0) {                   
                        $sanpham = load_ct($_GET['idpro']);
                        // $sp=load_spchitiet($_GET['idpro']);
                         $si1=load_size($_GET['idpro']);
                         $spcl=load_sanpham_cungloai($_GET['idpro'], $sanpham['iddm']);
                         $binhluan=loadall_binhluan($_GET['idpro']);
                        include "view/chitietsanpham.php";
                }
                else{
                    include "view/home.php";            
                }
                break;
            //user
            case "login":
                include "view/login/dangnhap.php";
                break;
            case "dangxuat":
                dangxuat();
                header("Location:/DA1/index.php");
                break;
            case "dangky":
                if(isset($_POST['dangky']) && $_POST['dangky']){
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    insert_taikhoan($user,$pass,$email,$address,$phone);
                    $sql="select *from taikhoan where iduser =(select max(iduser) from taikhoan)";
                    $tk=pdo_query_one($sql);
                    addcart($tk['iduser'],0);                  
                    $thongbao="Đã đăng ký thành công";
                 }
                 
                include "view/login/dangky.php";
                break;
                case "capnhat":
                    include "view/login/capnhattk.php";
                    break;
            case "quenmatkhau":
                if(isset($_POST['guiemail'])){
                    $email = $_POST['email'];
                    $sendMailMess = sendMail($email);
                }
                include "view/login/quenmatkhau.php";
                break;
            //giohang
            case "listcart":
                if (isset($_SESSION['user'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $listcart=listcart($iduser);
                }                
                include "view/giohang.php";
                break;           
            case "addcart":
                if (isset($_POST['addtocart']) && isset($_GET['idpro']) && isset($_GET['iduser'])) {
                    $cart=loadone_cart($_GET['iduser']);
                    $size=$_POST['size'];
                    $soluong=$_POST['soluong'];
                    $price=$_POST['price'];
                    $total_price= $soluong*$price;
                    $check = checkProCart($cart['idgiohang'],$_GET['idpro'],$size);
                    if(count($check )> 0) {
                        // var_dump($check);
                        updateQuantilyProCart($check[0]['idchitietgh'],$soluong);
                    }else{
                        add_cartchitiet($cart['idgiohang'],$_GET['idpro'],$size,$price,$soluong,$total_price);
                    }
                }
                header("Location:index.php?act=listcart&iduser=".$_GET['iduser']);
                break;
            case "delete_cart":
                if (isset($_GET['idchitietgh']) && $_GET['idchitietgh']) {
                    delete_cart($_GET['idchitietgh']);
                    
                }
                header("Location:/DA1/index.php?act=listcart&iduser=".$_SESSION['user']['iduser']);
                break;
            //donhang
            case "muahang":
                if (isset($_SESSION['user'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    
                    $listcart=listcart($iduser);
                    $listtt=loadthanhtoan();
                }
                    
                if(isset($_GET['vnp_ResponseCode']) && isset($_GET['vnp_TransactionStatus'])) {
                    if($_GET['vnp_ResponseCode'] == 00 && $_GET['vnp_TransactionStatus'] == 00) {
                        $sql1="select * from giohang where iduser=".$_SESSION['user']['iduser'];
                        $gh=pdo_query_one($sql1);
                        delete_all_cart($gh['idgiohang']);
                        echo "<script>window.location = '/DA1/index.php?act=myorder&iduser=$iduser'</script>";
                        
                    }else {
                        $sql2="DELETE from donhang where iddonhang=(select max(iddonhang) from donhang)";
                        pdo_execute($sql2);
                        
                    }
                }
                if(isset($_GET['resultCode']) ) {
                    if($_GET['resultCode'] == 0) {
                        $sql1="select * from giohang where iduser=".$_SESSION['user']['iduser'];
                        $gh=pdo_query_one($sql1);
                        delete_all_cart($gh['idgiohang']);
                        echo "<script>window.location = '/DA1/index.php?act=myorder&iduser=$iduser'</script>";
                        
                    }else {
                        $sql2="DELETE from donhang where iddonhang=(select max(iddonhang) from donhang)";
                        pdo_execute($sql2);
                        
                    }
                }      
                include "view/donhang.php";
                break;
            case "addorder":
                if (isset($_POST['muahang']) && isset($_SESSION['user'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $name_user=$_POST['name_user'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $phone=$_POST['phone'];
                    update_tkdonhang($iduser,$email,$address,$phone,$name_user);
                    $sql="SELECT * from taikhoan where iduser=$iduser";
                    $account = pdo_query_one($sql);
                    $_SESSION['user']=$account;

                    $idpay=$_POST['idpayod'];
                    $total_price=$_POST['total_price'];
                    $total_money=$_POST['total_money'];                    
                    $donhang=addorder($iduser,$total_money,$idpay);
                    $sql1="select * from giohang where iduser=".$_SESSION['user']['iduser'];
                    $gh=pdo_query_one($sql1); 
                    $listcart=listcart($iduser);       
                    $idpro=$_POST['idpro'];                    
                    $sql="select * from donhang where iddonhang =(select max(iddonhang) from donhang)";
                    $order=pdo_query_one($sql);
                    foreach($listcart as $cart){
                
                        $addorder=addtorder($order['iddonhang'],$cart['idpro'],$cart['price'],$cart['soluong'],$cart['size'],$cart['total_price']);
                        update_ctsp($cart['soluong'],$cart['idpro'],$cart['size']);
                    }
                    if($idpay == 2) {
                        $url = payvnpay($total_money ,$iduser);
                        
                        if($url) {
                            echo "<script>window.location = '$url'</script>";
                              
                            
                        }
                        
                        
                    }elseif ($idpay==3) {
                        $url=payMoMo($total_money ,$iduser);
                        if($url) {
                            echo "<script>window.location = '$url'</script>";
                              
                            
                        }
                    }else {
                        delete_all_cart($gh['idgiohang']);
                        echo "<script>window.location = '/DA1/index.php?act=myorder&iduser=$iduser'</script>";
                    }
                    
                    
                                      
                }
                
                
                break;
            case "myorder":
                if (isset($_SESSION['user']['iduser'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $load_mydh=load_mydh($iduser);
                    
                }
                include "view/order/myorder.php";
                break;
            case "xacnhan":
                if (isset($_SESSION['user']['iduser'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $load_mydh1=load_mydh1($iduser);
                    
                }
                include "view/order/xacnhan.php";
                break;
            case "vanchuyen":
                if (isset($_SESSION['user']['iduser'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $load_mydh2=load_mydh2($iduser);
                    
                }
                include "view/order/vanchuyen.php";
                break;
            case "update3":
                if (isset($_GET['iddonhang']) && isset($_SESSION['user']['iduser'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $iddonhang=$_GET['iddonhang'];
                    updatedh3($iddonhang);
                }
                header("Location:/DA1/index.php?act=damua&iduser=$iduser");
                break;
            case "damua":
                if (isset($_SESSION['user']['iduser'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $load_mydh3=load_mydh3($iduser);
                    
                }
                include "view/order/damua.php";
                break;
            case "huydon":
                if (isset($_GET['iddonhang']) && isset($_SESSION['user']['iduser'])) {
                    $iduser=$_SESSION['user']['iduser'];
                    $iddonhang=$_GET['iddonhang'];
                    delete_order($iddonhang);
                }
                header("Location:/DA1/index.php?act=myorder&iduser=$iduser");
                break;
            case "new":
                $listnew=load_new();
                include "view/new.php";
                break;
            case "blog":
                if(isset($_GET['idnew']) && $_GET['idnew'] >0){
                    $idnew = $_GET['idnew'];
                    $new= loadall_one_blog($idnew);
                }
                $listnew=load_new();
                include "view/new-chitiet.php";
            break;
           }
            
            
           
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>