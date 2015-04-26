<?php



    $fname  = $_REQUEST['fname'];

    $lname  = $_REQUEST['lname'];

    //$name  = $_REQUEST['name'];

    $email = $_REQUEST['email'];

    $desc  = $_REQUEST['message'];



    $emailSubject = 'Fonebox Website - Mail';

    $emailMessage = $desc;

    $emailTo = 'ask@fonebox.com.sg';

    $headers = "MIME-Version: 1.0" . "\r\n";

    $headers .= "Content-type:text/html; charset=iso-8859-1" . "\r\n";

    $headers .= "From: ".$fname.' '.$lname." <.".$email.">" . "\r\n";



    //$headers .= "From: $name <$email>" . "\r\n";



if(mail($emailTo,$emailSubject,$emailMessage,$headers)){

    echo"<script type='text/javascript'>

            alert('Mail successfully sent.');

            location.href='contact_us.php';

        </script>";

    exit;

}else{

    echo"<script type='text/javascript'>

            alert('Unable to send email. Please try again.');

            location.href='contact_us.php';

        </script>";

    exit;

}



?>