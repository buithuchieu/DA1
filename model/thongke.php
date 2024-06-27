<?php
function loadtksp(){
    $sql="select name_pro ,chitietdonhang.idpro ,sum(total_price) as sotien,COUNT(chitietdonhang.idpro) as sodon from chitietdonhang join sanpham on chitietdonhang.idpro=sanpham.idpro group by idpro ORDER by COUNT(chitietdonhang.idpro) DESC limit 0,5 ";
    $sp=pdo_query($sql);
    return $sp;
}
function tinhtien(){
    $sql="select count(*) as sodon ,sum(total_money) as tongtien from donhang ";
    $tktt=pdo_query($sql);
    return $tktt;
}
// function thongketongtien(){
//     $sql="select count(*) as sodon,sum(total_money) as tongtien from donhang where ngaydat=date(26-11-2023) ";
//     $tktt=pdo_query_one($sql);
//     return $tktt;
// }
// function thongketongtien1(){
//     $sql="select count(*) as sodon,sum(total_money) as tongtien from donhang where ngaydat=date(27-11-2023) ";
//     $tktt=pdo_query_one($sql);
//     return $tktt;
// }
// function tt(){
//     for($i=0;$i < 7 ; $i++) { 
//         // $doituong = new stdClass;
//         $date = date('Y-m-j');
//         $newdate = strtotime ( "-$i day" , strtotime ( $date ) ) ;
//         $newdate = date ( 'Y-m-j' , $newdate );
//         $user_sql = "SELECT COUNT(*) as 'count', SUM(total_money) as 'total' FROM donhang WHERE ngaydat like '%$newdate%'";
//         $tt=pdo_query_one($user_sql);
//     }
// }
?>