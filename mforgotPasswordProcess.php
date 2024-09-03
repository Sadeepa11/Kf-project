<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["me"])){

    $email = $_GET["me"];

    $rs = Database::search("SELECT * FROM `merchant` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $data = $rs->fetch_assoc();
        $pw = $data["pw"];

        

    

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sadeepasrirohanasinghe2@gmail.com';
            $mail->Password = 'dgrrfxryvhzxscob';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sadeepasrirohanasinghe2@gmail.com', 'Forgot Password');
            $mail->addReplyTo('sadeepasrirohanasinghe2@gmail.com', 'Forgot Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Forgot Password Verification Code';
            $bodyContent = '<h4 style="color:Black">Your Password is '.$pw.'</h4>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Password sending failed';
            } else {
                echo 'Success';
            }

    }else{
        echo ("Invalid Email address");
    }

}

?>