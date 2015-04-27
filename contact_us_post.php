<?php



    $fname  = $_REQUEST['first_name'];
    $lname  = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    
    $country = $_REQUEST['country'];
    $country_code = $_REQUEST['country_code'];
    $phone = $_REQUEST['phone'];
    $website = $_REQUEST['website'];
    
    $company_name = $_REQUEST['company_name'];
    $company_type = "";
    if(isset($_REQUEST['company_type']))
    {
        $company_type_id = $_REQUEST['company_type'][0];
        $company_type = $company_type_id == 0 ? "Termination Provider":$company_type;
        $company_type = $company_type_id == 1 ? "Wholesaler / Reseller":$company_type;
        $company_type = $company_type_id == 2 ? "Retailer":$company_type;
        $company_type = $company_type_id == 3 ? "Other":$company_type;
    }    
    $daily_revenue = "";
    if(isset($_REQUEST['daily_revenue']))
    {
        $daily_revenue_id = $_REQUEST['daily_revenue'][0];
        $daily_revenue = $daily_revenue_id == 0 ? "Under $1,000":$daily_revenue;
        $daily_revenue = $daily_revenue_id == 1 ? "$1,000 - $10,000":$daily_revenue;
        $daily_revenue = $daily_revenue_id == 2 ? "$10,000 - $50,000":$daily_revenue;
        $daily_revenue = $daily_revenue_id == 3 ? "$50,000 +":$daily_revenue;
    }
    
    $im_type = "";
    $im_selection_id = $_REQUEST['im_selection'];
    $im_type = $im_selection_id == 0 ? "AIM":$im_type;
    $im_type = $im_selection_id == 1 ? "Gtalk":$im_type;
    $im_type = $im_selection_id == 2 ? "MSN":$im_type;
    $im_type = $im_selection_id == 3 ? "Skype":$im_type;
    $im_type = $im_selection_id == 4 ? "Yahoo":$im_type;
    $im = $_REQUEST['im'];    
    $desc  = $_REQUEST['message'];

    $emailSubject = 'Fonebox Website - Mail';

    $emailMessage = "";
    $emailMessage = $emailMessage."Country:".$country."<br/>";
    $emailMessage = $emailMessage."Phone:".$country_code.$phone."<br/>";
    $emailMessage = $emailMessage."Website:".$website."<br/>";
    $emailMessage = $emailMessage."Company Name:".$company_name."<br/>";
    $emailMessage = $emailMessage."Company Type:".$company_type."<br/>";
    $emailMessage = $emailMessage."Daily Revenue:".$daily_revenue."<br/>";
    $emailMessage = $emailMessage."IM:".$im_type.":".$im."<br/>";
    
    $emailMessage = $emailMessage.$desc;
    
    print_r($emailMessage);
    return;

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