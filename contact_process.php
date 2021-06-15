<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require('vendor/phpmailer/phpmailer/src/Exception.php');
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    $SITE_KEY = "6Ld-PsQZAAAAAJPAnHt-6uHpkkXsFxhDUHA_slqS";
    $SECRET_KEY = "6Ld-PsQZAAAAAB_8xBnHlS8g7ZHxuujyR77e0UZ2";
    $output = "";

    if (isset($_POST["submit-contact"])) {
        require('vendor/google/recaptcha/src/autoload.php');

        $user_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $user_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $user_subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
        $user_message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

        $recaptcha = new \ReCaptcha\ReCaptcha($SECRET_KEY);
        $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        if (!$resp->isSuccess()) {
            die("ReCaptcha not satisfied. Please reload the page.");
        }

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "dfeng102938@gmail.com";
        $mail->Password   = "Dylan@5188";

        $mail->IsHTML(true);
        $mail->AddAddress("dylan.feng.01@gmail.com", "Dylan Feng");
        $mail->SetFrom($user_email, $user_name);
        $mail->AddReplyTo($user_email, $user_name);
        $mail->Subject = $user_subject;
        $content = $user_message;

        $mail->MsgHTML($content);
        if(!$mail->Send()) {
            $output = "<script>alert('Error while sending message.');</script>";
        } else {
            $output = "<script>alert('Message sent successfully');</script>";
        }
    }

    echo $output;
    header("Location: http://dylanfeng.me");
