<?php 
$name = $_POST['name'];
$user = $_POST['username'];
$pass = $_POST['password'];
$pass2 = $_POST['confirm-password'];
$servername = "localhost";

$username = "root";
$password = "naruto523";
if($pass!=$pass2){
    echo "<script>alert('đăng ký thất bại ! 2 mật khẩu không giống nhau ');</script>";
    require_once 'D:\DACS1\HTML\regester.html';
}
else{
    $db = mysqli_connect($servername, $username, $password , "javacuoiki2");
    $sql = "INSERT INTO account (ten, email, matkhau) VALUES ('$name', '$user', '$pass')";
$rs = mysqli_query($db, $sql);

if($rs){
    echo "<script>alert('Welcome $name');</script>";
    require_once 'D:\DACS1\HTML\homepage.html';
} else {
    echo "<script>alert('Đăng ký thất bại!');</script>";
    require_once 'D:\DACS1\HTML\register.html';
}
}


?>