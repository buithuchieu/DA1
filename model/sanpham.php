<?php
function insert_sanpham($tensp,$giasp,$hinh,$luotxem,$mota,$iddm){
    $sql = "insert into sanpham(name_pro,price,img,luotxem,mota,iddm) values('$tensp','$giasp','$hinh','$luotxem','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($idpro){
    $sql = "delete from sanpham where idpro =".$idpro;
    pdo_execute($sql);
}
function loadone_sanpham($idpro){
    $sql = "select * from sanpham where idpro=".$idpro;
    $sp=pdo_query_one($sql);
    return $sp;
}
function loadall_sanpham($kyw,$iddm){
    $sql="select idpro,name_pro,price,luotxem,mota,img,name from sanpham join danhmuc on sanpham.iddm = danhmuc.iddm where 1 and sanpham.deleted = 0";
    //where 1 tức là đúng
    if ($kyw!="") {
        $sql.=" and name_pro like '%".$kyw."%'";
    }
    if ($iddm >0) {
        $sql.=" and sanpham.iddm = '".$iddm."'";
    }
    
    $sql.=" order by idpro desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function loadkho_sanpham(){
    $sql="select idpro,name_pro,price,luotxem,mota,img,name from sanpham join danhmuc on sanpham.iddm = danhmuc.iddm where 1 and sanpham.deleted = 1";
    //where 1 tức là đúng
    $sql.=" order by idpro desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function load_all_sanpham($kyw,$iddm,$price){
    $sql="select idpro,name_pro,price,luotxem,mota,img,name from sanpham join danhmuc on sanpham.iddm = danhmuc.iddm where 1 ";
    //where 1 tức là đúng
    if ($kyw!="") {
        $sql.=" and name_pro like '%".$kyw."%'";
    }
    if ($iddm >0) {
        $sql.=" and sanpham.iddm = '".$iddm."'";
    }
    if ($price>0) {
        if ($price==1) {
            $sql.=" and sanpham.price <=300000";
        }elseif ($price==2) {
            $sql.=" and sanpham.price between 300001 and 500000";
        }elseif ($price==3) {
            $sql.=" and sanpham.price between 500001 and 600000";
        }elseif ($price==4) {
            $sql.=" and sanpham.price between 600001 and 700000";
        }else{
            $sql.=" and sanpham.price between 700001 and 800000";
        }
    }
    $sql.=" order by idpro desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function update_sanpham($idpro,$iddm,$tensp,$giasp,$luotxem,$mota,$hinh){
    if($hinh!="")
    $sql = "update sanpham set iddm='".$iddm."',name_pro='".$tensp."', price='".$giasp."',luotxem='".$luotxem."',mota='".$mota."',img='".$hinh."' where idpro=".$idpro;
    else
    $sql = "update sanpham set iddm='".$iddm."',name_pro='".$tensp."', price='".$giasp."',luotxem='".$luotxem."',mota='".$mota."' where idpro=".$idpro;
    pdo_execute($sql);
}
function load8sp_new(){
    $sql="select * from sanpham order by idpro asc limit 0,8";
    $sp=pdo_query($sql);
    return $sp;
}
function load8sp_hot(){
    $sql="select * from sanpham order by luotxem asc limit 0,8";
    $sp=pdo_query($sql);
    return $sp;
}
function load_ten_dm($iddm){
    if($iddm>0){
    $sql = "select * from danhmuc where iddm=".$iddm;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
    }else{
      return "";
    }
}
function load_sanpham_cungloai($idpro, $iddm){
    $sql = "select * from sanpham where iddm = $iddm and idpro <> $idpro  order by idpro asc limit 0,4 ";
    $sp = pdo_query($sql);
    return $sp;
}
//chitietsp admin
function load_ctsp($idpro){
    $sql="select sanpham.idpro ,name_pro , img , price , size ,soluong ,mota ,idchitietsp from sanpham join chitietsanpham on sanpham.idpro = chitietsanpham.idpro join size on chitietsanpham.idsize = size.idsize where sanpham.idpro=$idpro";
    $listspct=pdo_query($sql);
    return $listspct;
}
function load_ct($idpro){
    $sql="select sanpham.idpro ,name_pro , img , price , size ,soluong ,mota ,idchitietsp,chitietsanpham.idsize,sanpham.iddm from sanpham join chitietsanpham on sanpham.idpro = chitietsanpham.idpro join size on chitietsanpham.idsize = size.idsize where sanpham.idpro=$idpro";
    $listspct=pdo_query_one($sql);
    return $listspct;
}
function load_size($idpro){
    $sql="select size ,chitietsanpham.idsize,soluong from size join chitietsanpham on size.idsize=chitietsanpham.idsize where chitietsanpham.idpro=$idpro";
    $size=pdo_query($sql);
    return $size;
}
function insert_ctsp($idpro,$idsize,$soluong){
    $sql="insert into chitietsanpham(idpro,idsize,soluong) values('$idpro','$idsize','$soluong')";
    pdo_execute($sql);
}
function delete_ctsp($idchitietsp){
    $sql="delete from chitietsanpham where idchitietsp=$idchitietsp";
    pdo_execute($sql);
}
function delete_memsp($idpro){
    $sql="UPDATE `sanpham` SET `deleted`=1 WHERE idpro =".$idpro;
    pdo_execute($sql);
}
function soluong_sp(){
    $sql="SELECT COUNT(*) AS idpro
    FROM sanpham";
    $soluong = pdo_query_one($sql);
    return $soluong;
}
function update_khosp($idpro){
    $sql="UPDATE `sanpham` SET `deleted`=0 WHERE idpro =".$idpro;
    pdo_execute($sql);
}
// function loadallprice1(){
//     $sql="select "
// }
function update_ctsp($soluong,$idpro,$idsize){
    $sql="update chitietsanpham join sanpham on chitietsanpham.idpro=sanpham.idpro join chitietdonhang on sanpham.idpro = chitietdonhang.idpro 
    join size on chitietsanpham.idsize = size.idsize set chitietsanpham.soluong=chitietsanpham.soluong-$soluong 
    where chitietsanpham.idpro =$idpro and size.size=$idsize";
    pdo_execute($sql);
}
?>