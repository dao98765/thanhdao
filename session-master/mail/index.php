<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['signupOK'])) {
    header("Location:../admin/signup.php");
}
?>
<?php
$user_email = $_GET['email'];
$user_name = $_GET['name'];
$user_pass = $_GET['pass'];
//* include required phpmailer files
require './PHPMailer.php';
require './SMTP.php';
require './Exception.php';
//* define namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); //* Create instance of phpmailer


try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); //* set mailer to use smtp
    $mail->Host = 'smtp.gmail.com'; //* define smtp host
    $mail->SMTPAuth = 'true'; //* enable smtp authentication
    $mail->SMTPSecure = 'tls'; //* set type of encryption (ssl, tls)
    $mail->Port = '587'; //* set post to connect smtp
    $mail->Username = 'daont1810@gmail.com'; //* set gmail username
    $mail->Password = 'dao181001'; //* set gmail pass
    $mail->CharSet = 'UTF-8'; //* set vietnamese
    //Recipients
    //* set sender email
    $mail->setFrom('daont1810@gmail.com', 'Nguyễn thanh đào');
    //* add recipient
    $mail->addAddress("$user_email"); //! variable must in ""
    //* Set email format to HTML
    $mail->isHTML(true);
    //* set email subject
    $mail->Subject = '[Đăng ký tài khoản Phonebook]';
    //* mail body
    $bodyContent = '<p>Thân gửi: ' . $user_name . '</p>';
    $bodyContent .= '<p>Chúc mừng bạn đã đăng ký thành công</p>';
    $bodyContent .= '<p>mật khẩu của bạn là ' . $user_pass . '</p>';

    $mail->Body = $bodyContent;
    //* add data to database & send email
    if ($mail->send()) {
        echo "đăng ký thành công kiểm tra email";
    } else {
        echo "đăng kí không thành công";
    }
    //* close smtp connection
    $mail->smtpClose();
    //* unset session
    if (isset($_SESSION['signupOK'])) {
        unset($_SESSION['signupOK']);
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
