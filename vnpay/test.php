<form action="" method="POST">
    <button name="btn" type="submit">TEst</button>

</form>
<?php
include "./vnpay.php";
if (isset($_POST['btn'])) {
    $vnpay=getUrlPayVnpay(1000000,1);
    echo "<script>window.location = '$vnpay'</script>";
}

?>