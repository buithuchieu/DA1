<?php
function load_new(){
    $sql="select * from news order by idnew desc";
    $listnew=pdo_query($sql);
    return $listnew;
}
function delete_blog($idnew){
    $sql="delete from news where idnew=".$idnew;
    $listblog=pdo_execute($sql);
}
function insert_blog($name_new,$hinh,$discription,$discription_all){
    $sql = "INSERT INTO news (name_new,new_img,discription,discription_all) values('$name_new', '$hinh','$discription','$discription_all')";
    pdo_execute($sql);
}
function loadall_one_blog($idnew){
    $sql = "select * from news where idnew =".$idnew;
    $listblog = pdo_query_one($sql);
    return  $listblog;
}
?>