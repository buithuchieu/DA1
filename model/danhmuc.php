<?php
function loadall_danhmuc(){
    $sql="select * from danhmuc where deleted =0 order by iddm asc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function loadkho_danhmuc(){
    $sql="select * from danhmuc where deleted =1 order by iddm asc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function load_all_danhmuc(){
    $sql="select * from danhmuc order by iddm asc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function insert_danhmuc($tenloai){
    $sql="insert into danhmuc(name) values('$tenloai')";
    $listdanhmuc=pdo_execute($sql);
}
function delete_danhmuc($iddm){
    $sql="delete from danhmuc where iddm=".$iddm;
    $listdanhmuc=pdo_execute($sql);
}
function loadone_danhmuc($iddm){
    $sql="select * from danhmuc where iddm=".$iddm;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($tenloai,$iddm){
    $sql="update danhmuc set name='$tenloai' where iddm=".$iddm;
    $listdanhmuc=pdo_execute($sql);
}
function loadall_danhmuc_home(){
    $sql="select * from danhmuc order by iddm asc limit 0,3";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function loadall_danhmuc_header(){
    $sql="select * from danhmuc order by iddm asc limit 0,4";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function delete_mem($iddm){
    $sql="UPDATE `danhmuc` SET `deleted`=1 WHERE iddm =".$iddm;
    pdo_execute($sql);
}
function khodm($iddm){
    $sql="UPDATE `danhmuc` SET `deleted`=0 WHERE iddm =".$iddm;
    pdo_execute($sql);
}
?>