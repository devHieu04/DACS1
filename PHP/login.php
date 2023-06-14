<?php 
$user = $_POST['username'];
$pass = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "naruto523";


$db =  mysqli_connect($servername, $username, $password , "javacuoiki2");
$sql = "select * from account where email ='$user' and matkhau='$pass'";
$rs = mysqli_query($db,$sql);
session_start();
$_SESSION['taikhoan'] = $user;
$_SESSION['matkhau'] = $pass;
if(mysqli_num_rows($rs)>0){
    require_once 'D:\DACS1\PHP\homelogin.php';
} else {
    echo "<script>alert('dang nhap that bai');</script>";
    require_once 'D:\DACS1\HTML\loginpage.html';
}
?>