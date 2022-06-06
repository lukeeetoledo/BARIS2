<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include 'SYSTEM_config.php';

if (isset($_POST['txt_email_cnumber'])) {
    $email_cnumber = $_POST['txt_email_cnumber'];
    $query_Check_email_cnumber = "SELECT * FROM system_accounts_tbl WHERE account_Email = '$email_cnumber' OR account_Contactnumber = '$email_cnumber'";
    $result_Check_email_cnumber = mysqli_query($conn, $query_Check_email_cnumber);

    if (mysqli_num_rows($result_Check_email_cnumber) > 0) {
        $row_CEC = mysqli_fetch_assoc($result_Check_email_cnumber);
        $real_Email = $row_CEC['account_Email'];

        if ($real_Email == $email_cnumber) {
            $user_ID = $row_CEC['user_ID'];
            // TOKEN
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);
            // VALIDITY
            $token_Validty = date('Y-m-d', strtotime("+1 day"));
            $query_Set_token_validity = "UPDATE system_accounts_tbl SET account_Token = '$token', token_Validity = '$token_Validty' WHERE user_ID = '$user_ID'";
            $result_Set_token_validity = mysqli_query($conn, $query_Set_token_validity);
            $query_Check_userID = "SELECT * FROM barangay_users_tbl WHERE user_ID = '$user_ID'";
            $result_Check_userID = mysqli_query($conn, $query_Check_userID);
            if (mysqli_num_rows($result_Check_userID) > 0) {
                $row_CuID = mysqli_fetch_assoc($result_Check_userID);
                 // EMAIL
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                $mail->SMTPDebug  = 0;
                $mail->SMTPAuth   = TRUE;
                $mail->SMTPSecure = "tls";
                $mail->Port       = 587;
                $mail->Host       = "mail.baris.com.ph";
                $mail->Username   = "forgot-password@baris.com.ph";
                $mail->Password   = "#zfYT.KHMBy5";

                $mail->IsHTML(true);
                $mail->AddAddress($email_cnumber, "recipient-name");
                $mail->SetFrom($my_email, "BaRIS");
                $mail->AddReplyTo($my_email, "reply-to-name");
                $mail->AddCC($email_cnumber, "cc-recipient-name");
                $mail->Subject = "Reset Password - BaRIS";
                $content = "<p><strong>Dear Mr./Ms. {$row_CuID['user_Lname']},</strong></p>
                 <p>Forgot Password? Not a problem. Click below link to reset your password.</p>
                 <p><a href='{$base_url}confirmpass.php?token={$token}&uid={$user_ID}'>Reset Password</a></p>
                 <p>If not on the primary inbox search the mail at the *Spam Collection*. </p>
                 <p>Kindly report as not a spam. </p>
                 <p>The link will expire at the end of the day. </p>";
                 $mail->Body = $content;
                if (!$mail->Send()) {
                    echo $mail->ErrorInfo;
                } else {
                    echo "<script>
                      alert('We have sent a reset password link to your email - {$email_cnumber}. Check inbox or spam.');
                      window.location.href='../index.php';
                      </script>";
                }
            }
        } else {
            require_once('API_SMS.php');
            $user_ID = $row_CEC['user_ID'];
            // TOKEN
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);
            // VALIDITY
            $token_Validty = date('Y-m-d', strtotime("+1 day"));
            $query_Set_token_validity = "UPDATE system_accounts_tbl SET account_Token = '$token', token_Validity = '$token_Validty' WHERE user_ID = '$user_ID'";
            $result_Set_token_validity = mysqli_query($conn, $query_Set_token_validity);
            $receiver = $email_cnumber;
            $message = "BARIS_LINK: {$base_url}confirmpass.php?token={$token}&uid={$user_ID}" . "\r\n" . "\r\n";
            $smsAPICode = "TR-BARIS046211_MC7ZA";
            $smsAPIPassword = "vl8ly{i2bx";
    
            $send = new ItextMo();
            $send->itexmo($receiver, $message, $smsAPICode, $smsAPIPassword);
            if ($send == false) {
                echo "<script>alert('Mail not sent. Please try again.');</script>";
            } else {
                echo "<script>
                      alert('We have sent a reset password link to your your mobile number - {$email_cnumber}.');
                      window.location.href='../index.php';
                      </script>";
            }
        }
    } else {
        echo "<script>
        window.setTimeout(function() {
          window.location = '../forgotpass.php';
        }, 3000);
        alert('Email/Contact number not found.');
        </script>";
    }
}
?>