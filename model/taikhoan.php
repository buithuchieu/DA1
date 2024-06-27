<?php
session_start();
function insert_taikhoan($user,$pass,$email,$address,$phone){
    $sql="insert into taikhoan(user,pass,email,address,phone) values ('$user','$pass','$email','$address','$phone')";
    $taikhoan=pdo_execute($sql);
}
function check_dki(){
    $sql="select * from taikhoan ";
    $listuser=pdo_query($sql);
    return  $listuser;
}
function check_login($user,$pass){
    $sql="SELECT * from taikhoan where user='$user' and pass='$pass'";
    $account = pdo_query_one($sql);
    if ($account != false) {
        if ($account['deleted']==1) {
                echo "<script>alert('Tài khoản của bạn đã bị khóa')</script>";
                return ;
            }
        $_SESSION['user']=$account;
        return $account;
        
    }else{
        return 'Sai thông tin';
    }
}
function dangxuat(){
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
}
function loadall_user(){
    $sql="select * from taikhoan where deleted=0 order by iduser asc ";
    $listuser=pdo_query($sql);
    return  $listuser;
}
function delete_user($iduser){
    $sql="delete from taikhoan where iduser=".$iduser;
    $listuser=pdo_execute($sql);
}
function update_taikhoan($iduser,$user,$pass,$email,$address,$phone,$avatar,$name_user){
    if ($avatar!="")
        $sql ="update taikhoan set user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',phone='".$phone."',avatar='".$avatar."',name_user='".$name_user."' where iduser=".$iduser;
    else
    $sql ="update taikhoan set user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',phone='".$phone."',name_user='".$name_user."' where iduser=".$iduser;
    pdo_execute($sql);
}
function update_tkdonhang($iduser,$email,$address,$phone,$name_user){
    $sql ="update taikhoan set email='".$email."',address='".$address."',phone='".$phone."',name_user='".$name_user."' where iduser=".$iduser;
    pdo_execute($sql);
}
function soluong_tk(){
    $sql="SELECT COUNT(*) AS iduser
    FROM taikhoan";
    $soluong = pdo_query_one($sql);
    return $soluong;
}
function ban($iduser){
    $sql="update taikhoan set deleted =1 where iduser=".$iduser;
    pdo_execute($sql);
}
function un_ban($iduser){
    $sql="update taikhoan set deleted =0 where iduser=".$iduser;
    pdo_execute($sql);
}
function loadall_ban(){
    $sql="select * from taikhoan where deleted = 1 order by iduser asc ";
    $listuser=pdo_query($sql);
    return  $listuser;
}
function sendMail($email){
    $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
    $taikhoan = pdo_query_one($sql);

    if($taikhoan != false){
        sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
        return "gửi email thành công";
    }else{
        return "email bạn nhập không có trong hệ thống";
    }
}

function sendMailPass($email, $username, $pass){
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '05be739f8fad46';                     //SMTP username
        $mail->Password   = '0cd7b0cac2322e';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('da1@example.com','da1');
        $mail->addAddress($email, $username);     //Add a recipient


      
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mat khau cua ban la: ' .$pass;

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>