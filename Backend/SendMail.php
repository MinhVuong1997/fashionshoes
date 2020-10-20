<?php 
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST["email"];
$title = $_POST["title"];
$content = $_POST["content"];
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'minhvuongkc97@gmail.com';                 // SMTP username
    $mail->Password = '26/03/1997';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true
        ));
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('minhvuongkc97@gmail.com', 'FashionShoes');
    // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    foreach ($email[1] as $key => $value) {
    	 $mail->addAddress($value);
    }
                  // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = $content;
    $mail->AltBody = $content;
 
    $mail->send();
    echo '<div class="alert alert-success">Mail đã được gửi</div>';
} catch (Exception $e) {
    echo 'Lỗi: ', $mail->ErrorInfo;
}

 ?>