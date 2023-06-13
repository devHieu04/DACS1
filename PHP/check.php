<?php
session_start(); 
$codenhap = $_POST['code'];
$pass = $_POST['password'];
$pass2 = $_POST['confirm-password'];
if($pass!=$pass2){
    echo "<script>alert('đổi mật khẩu thất bại ! 2 mật khẩu không giống nhau ');</script>";
}
else{
    if (isset($_SESSION['code'])) {
        $code = $_SESSION['code']; 

        $mail = $_SESSION['mail']; 
        if($codenhap==$code){
            $servername = "localhost";
    $username = "root";
    $password = "naruto523";


    $db =  mysqli_connect($servername, $username, $password , "javacuoiki2");
    $sql = "UPDATE account SET matkhau ='$pass' WHERE email = '$mail'";
    $rs = mysqli_query($db,$sql);
        }
        else {
            echo "<script>alert('đổi mật khẩu thất bại ! sai mã xác thực ');</script>";
        }
    } else {
        echo "Mã code không tồn tại trong session";
    }

}

?>