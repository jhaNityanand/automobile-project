<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($email, $v_code)
{
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/PHPMailer.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'nityanandjha13578@gmail.com';                     //SMTP username
        $mail->Password   = '9016201780';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('nityanandjha13578@gmail.com');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Automobile Center !!! ';
        $mail->Body    = "<b>Thanks For Registeration...</b><br>
                            OTP is $v_code";

        $mail->send();
        return redirect("otp");
    }
    catch (Exception $e) {
        return "Failed Send Mail in Your Email id...(Server Down)";
    }
}
$abc = session('email'); $rand = session('code');

    /* $a = $_GET['email'];
    $b = $_GET['code']; */

    $a = $abc; $b = $rand;

    echo send_mail($a, $b);

?>
