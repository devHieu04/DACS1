<?php 
class Utils {
    public static $code = '';
  
    public static function getCode() {
        $chars = "0123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i<6; $i++) {
            $random = rand(0, strlen($chars)-1);
            self::$code .= substr($chars, $random, 1);
        }
        return self::$code;
    }
}

Utils::getCode();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\DACS1\phpmailer/src/Exception.php';
require 'D:\DACS1\phpmailer/src/PHPMailer.php';
require 'D:\DACS1\phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    // Send email with code
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username ='ngoanth.22it@vku.udn.vn';
    $mail->Password ='zuvnxxkwzziodddf';
    $mail->SMTPSecure = 'ssl';
    $mail->Port =465;
    $mail->setFrom('ngoanth.22it@vku.udn.vn');
    $mail->addAddress($_POST["username"]);
    $mail->isHTML(true);
    $mail->Subject ='OTP CODE';
    $mail->Body = Utils::$code;
    $mail->send();

    // Save code to session
    session_start();
    $_SESSION['code'] = Utils::$code;
    $_SESSION['mail']=$_POST["username"];

    echo "<script>alert('send success');</script>";
    require_once 'D:\DACS1\HTML\findpass.html';
}
?>