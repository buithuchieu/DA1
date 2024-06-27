<?php
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/size.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php"; 
    include "../model/donhang.php";
    include "../model/thongke.php";
    include "../model/pdo.php";
    include "../model/new.php";
    include "header.php";
    $dem1=soluong_sp();
    $dem2=soluong_bl();
    $dem3=soluong_tk();
    $dem4=soluong_dh();
    $tke=loadtksp();
    // $tt=tt();
    // var_dump($tt);
    // $money=tinhtien();
    // $d1=thongketongtien();
    // // var_dump($d1);
    // $d2=thongketongtien1();
    // foreach($money as $tien){
    //     $money2=thongketongtien($tien['ngaydat']);
    // }
    
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            // danhmuc
            case "listdm":
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case "adddm":
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $tenloai=$_POST['name'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case "xoadm":
                if (isset($_GET['iddm']) && $_GET['iddm']>0) {
                    delete_danhmuc($_GET['iddm']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case "suadm":                
                if (isset($_GET['iddm']) && $_GET['iddm']>0) {
                    $dm=loadone_danhmuc($_GET['iddm']);
                }
                include "danhmuc/update.php";
                break;
            case "update":
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $tenloai=$_POST['name'];
                    $iddm=$_POST['iddm'];
                    update_danhmuc($tenloai,$iddm);
                    $thongbao="Cập nhật thành công";
                    }
                    $listdanhmuc=loadall_danhmuc();
                    include "danhmuc/list.php";
                break;
            case "xoamem":
                if (isset($_GET['iddm']) && $_GET['iddm']>0) {
                    delete_mem($_GET['iddm']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case "khodm":
                $khodm=loadkho_danhmuc();
                include "danhmuc/khodm.php";
                break;
            case "updatekhodm":
                if (isset($_GET['iddm']) && $_GET['iddm']>0) {
                    khodm($_GET['iddm']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                //Sản phẩm
                case "listsp":
                    if(isset($_POST['listOk'])&&($_POST['listOk'])){
                        $kyw = $_POST['kyw'];  
                        $iddm = $_POST['iddm'];
                    }else{
                        $kyw='';
                        $iddm=0;
                    }
                    $listdanhmuc = loadall_danhmuc();
                    $listsanpham=loadall_sanpham($kyw,$iddm);
                    include "sanpham/list.php";
                    break;
                case "addsp":
                    if(isset($_POST['themmoi'])&& $_POST['themmoi']){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $luotxem =$_POST['luotxem'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
            
                    if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)) {
                    //
                    }else{
                    //
                    }
                    
                    insert_sanpham($tensp,$giasp,$hinh,$luotxem,$mota,$iddm);
                    $thongbao = "Thêm thành công";
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "sanpham/add.php";
                    break;
                case 'xoasp':
                        if(isset($_GET['idpro'])&& $_GET['idpro']>0){
                            delete_sanpham($_GET['idpro']);
                        }
                        $listsanpham=loadall_sanpham("",0);
                       include "sanpham/list.php";
                       break;
                       case 'suasp':
                        if(isset($_GET['idpro'])&& $_GET['idpro']>0){
                       $sanpham=loadone_sanpham($_GET['idpro']);
                        }
                        $listdanhmuc = loadall_danhmuc();
                        include "sanpham/update.php";
                       break;
                case 'updatesp':
                        if(isset($_POST['capnhat'])&&$_POST['capnhat']){
                           $idpro = $_POST['idpro'];
                           $iddm = $_POST['iddm'];
                           $tensp = $_POST['tensp'];
                           $giasp = $_POST['giasp'];
                           $mota = $_POST['mota'];
                           $hinh = $_FILES['hinh']['name'];
                           $luotxem =$_POST['luotxem'];
                           $target_dir = "../uploads/";
                           $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                       if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)) {
                        //
                       }else{
                       //
                       }
                       update_sanpham($idpro,$iddm,$tensp,$giasp,$luotxem,$mota,$hinh);
                            $thongbao = "Cập nhật thành công";
                            }
                            $listdanhmuc = loadall_danhmuc();
                            $listsanpham=loadall_sanpham("",0);
                       include "sanpham/list.php";
                       break;
                       case "xoamemsp":
                        if (isset($_GET['idpro']) && $_GET['idpro']>0) {
                            delete_memsp($_GET['idpro']);
                        }
                        $listsanpham=loadall_sanpham("",0);
                        include "sanpham/list.php";
                        break;
                    case "khosp":
                        $sp=loadkho_sanpham();
                        include "sanpham/khosp.php";
                        break;
                    case "updatekhosp":
                        if (isset($_GET['idpro']) && $_GET['idpro']) {
                            update_khosp($_GET['idpro']);
                        }
                        $listsanpham=loadall_sanpham("",0);
                        include "sanpham/list.php";
                        break;
                    //size
                    case"listsize":
                        $listsize=loadall_size();
                    include "size/list.php";
                    break;
    
                    case "addsize":
                        if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                            $size=$_POST['name'];
                            insert_size($size);
                            $thongbao="Thêm thành công";
                        }
                        include "size/add.php";
                        break;
                    case "xoasize":
                        if (isset($_GET['idsize']) && $_GET['idsize']>0) {
                            delete_size($_GET['idsize']);
                        }
                        $listsize=loadall_size();
                        include "size/list.php";
                        break;
                    case "suasize":                
                        if (isset($_GET['idsize']) && $_GET['idsize']>0) {
                            $size=loadone_size($_GET['idsize']);
                        }
                        include "size/update.php";
                        break;
                    case "update_size";
                        if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                            $size=$_POST['size'];
                            $idsize=$_POST['idsize'];
                            update_size($size,$idsize);
                            $thongbao="Cập nhật thành công";
                            }
                            $listsize=loadall_size();
                            include "size/list.php";
                        break;
                    //chitietsp
                    case"listspct":
                        if (isset($_GET['idpro'])) {
                            $listspct=load_ctsp($_GET['idpro']);
                            include "chitietsanpham/list.php";
                        }                        
                        break;
                    case "addctsp":
                        if (isset($_GET['idpro'])) {
                            $idPro = $_GET['idpro'];
                            include "chitietsanpham/add.php";
                        }
                        break;
                    case "xoactsp":
                        if (isset($_GET['idct'])) {
                            delete_ctsp($_GET['idct']);
                        }
                        if (isset($_GET['idpro'])) {
                            $listspct=load_ctsp($_GET['idpro']); 
                                                      
                        }
                        include "chitietsanpham/list.php"; 
                        
                        break;
                    //taikhoan
                    case"listuser":
                        $listuser= loadall_user();
                        include "taikhoan/list.php";
                    break;
                    case "xoauser":
                        if (isset($_GET['iduser']) && $_GET['iduser']>0) {
                            delete_user($_GET['iduser']);
                        }
                        $listuser=loadall_user();
                        include "taikhoan/list.php";
                        break;
                    case "banuser":
                        if (isset($_GET['iduser']) && $_GET['iduser']>0) {
                            ban($_GET['iduser']);
                        }
                        $listuser=loadall_user();
                        include "taikhoan/list.php";
                        break;
                    case "khoban":
                        $ban=loadall_ban();
                        include "taikhoan/listban.php";
                        break;
                    case "unban":
                        if (isset($_GET['iduser']) && $_GET['iduser']>0) {
                            un_ban($_GET['iduser']);
                        }
                        $listuser=loadall_user();
                        include "taikhoan/list.php";
                        break;
                    //binhluan
                    case "listbl":
                        $dsbinhluan = load_binhluan(0);
                        include "binhluan/list.php";
                         break;
                    case "xoabl":
                        if(isset($_GET['idcmt'])&& ($_GET['idcmt']>0)){
                            delete_binhluan($_GET['idcmt']);
                        }
                        $dsbinhluan=load_binhluan("",0);
                        include "binhluan/list.php";
                        break;
                    case "xoamemcmt":
                        if(isset($_GET['idcmt'])&& ($_GET['idcmt']>0)){
                            delete_membl($_GET['idcmt']);
                        }
                        $dsbinhluan=load_binhluan("",0);
                        include "binhluan/list.php";
                        break;
                    //donhang
                    case "listdon":
                        $listdonhang=listdonhang();
                        include "donhang/listdon.php";
                        break;
                    case "donchitiet":
                        if (isset($_GET['iddonhang']) ) {
                            $iddonhang=$_GET['iddonhang'];
                            $listctdh=listctdh($iddonhang);
                        }
                        include "donhang/donchitiet.php";
                        break;
                    case "update1":
                        if (isset($_GET['iddonhang']) ) {
                            $iddonhang=$_GET['iddonhang'];
                            updatedh1($iddonhang);
                        }
                        echo "<script>window.location='http://localhost/DA1/admin/index.php?act=listdon'</script>";
                        break;
                    case "update2":
                        if (isset($_GET['iddonhang']) ) {
                                $iddonhang=$_GET['iddonhang'];
                                updatedh2($iddonhang);
                                $listdh=listdonhang1($iddonhang);
                            }
                            include "donhang/giaohang.php";
                            break;
                    case "listdongiao":                        
                            $listdh=listdonhang1();                            
                        include "donhang/giaohang.php";
                        break;
                    case "listdonmua":                        
                            $listdh=listdonhang2();                            
                        include "donhang/giaohang.php";
                        break;
                    
                    case "listtkbl":
                        $tkbl=load_thongkebl();
                        include "bieudotk/bieudo.php";
                        break;
                        case "listbinhluan":
                            if (isset($_GET['idpro']) && $_GET['idpro']) {
                                $listbinhluan=load_binhluan($_GET['idpro']);
                                include "bieudotk/tongsobl.php";
                            }
                                
                             break;
                    case 'listnew':
                        $listblog = load_new();
                        include "new/list.php";
                        break;
                            
                        case 'xoablog':
                            if(isset($_GET['idnew'])&& ($_GET['idnew']>0)){
                                delete_blog($_GET['idnew']);
                            }
                            $listblog = load_new();
                            include "new/list.php";
                        break;   
                        
                        case "addblog":
                            if(isset($_POST['themmoi'])&& $_POST['themmoi']){
                            $name_new = $_POST['name_new'];
                            $discription= $_POST['discription'];
                            $discription_all = $_POST['discription_all'];
                            $hinh =$_FILES['hinh']['name'];
                            $target_dir = "../uploads/";
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                            if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)) {
                            //
                            }else{
                            //
                            }
                            insert_blog($name_new,$hinh,$discription,$discription_all);
                            $thongbao = "Thêm thành công";
                            }
                            $listblog =  load_new();
                            include "new/add.php";
                            break;
                                

                    
    
        }
    }else{
        include "home.php";
    }
    include "footer.php";
?>
