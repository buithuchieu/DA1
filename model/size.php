<?php
    function loadall_size(){
        $sql="select * from size order by idsize asc ";
        $listsize=pdo_query($sql);
        return  $listsize;
    }
    function delete_size($idsize){
        $sql="delete from size where idsize=".$idsize;
        $listsize=pdo_execute($sql);

    }
    function insert_size($size){
        $sql="insert into size(size) values('$size')";
        $listsize=pdo_execute($sql);
    }
    function loadone_size($idsize){
    $sql="select * from size where idsize=".$idsize;
    $size=pdo_query_one($sql);
    return $size;
}
function update_size($size,$idsize){
    $sql="update size set size='$size' where idsize=".$idsize;
    $listsize=pdo_execute($sql);
}
?>