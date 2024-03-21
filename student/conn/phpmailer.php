<?php 

// Deze dependencies laden we handmatig in... 

use PHPMailer\PHPMailer\PHPMailer; 

require '../../PHPMailer-master/src/PHPMailer.php'; 

require '../../PHPMailer-master/src/SMTP.php'; 

require '../../PHPMailer-master/src/Exception.php'; 

// deze functie stuurt e-mails via je mailaccount... 

function mailen($mailTo, $ontvangerNaam, $onderwerp, $bericht) { 

    $mail = new PHPMailer(); 

 

    //Verbinden met je mail account (<leerlingnummer>@<leerlingnummer>.hbcdeveloper.nl) 

    $mail->IsSMTP(); 

    $mail->SMTPAuth = true; 

    $mail->SMTPAutoTLS = false; 
    
    //$mail->SMTPSecure = 'ssl'; 

//Debuginformatie aanzetten… zet deze inproductie uit… 

    $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; 

    //$mail->Host = 'mail.<leerlingnummer>.hbcdeveloper.nl'; 

    $mail->Host = 'mail.71911.hbcdeveloper.nl'; 

    $mail->Port = 587; 

 

    //Identificeer jezelf bij je mailaccount 

    $mail ->Username = 'd71911'; 

    $mail ->Password = 'YOGK2nL32cZYvE'; 

 

    //E-mail opstellen... 

    $mail ->isHTML(true); 

// ook voor het mailadres staat een h!!! 

    $mail->setFrom("h71911@71911.hbcdeveloper.nl", "Arjan"); 

    $mail->Subject = $onderwerp; 

    $mail->CharSet ='UTF-8'; 

 

    $bericht = "<body style=\"font-family: Verdana, Verdana, Geneva, sans-serif;  

                    font-size: 14px; color: #000;\">" . $bericht . "</body>"; 

    $mail -> addAddress($mailTo, $ontvangerNaam); 

    //$mail ->addAddress('bkd@hoornbeeck.nl', "Dick") 

    $mail -> Body = $bericht; 

    //stuur de mail... 

    if ($mail->Send()) { 

        echo "<script>alert('Mail is verstuurd');</script>"; 

    } 

    else { 

        echo 'Mailer Error: '.$mail->ErrorInfo; 

        echo "<script>alert('Mail kon niet verstuurden worden...');</script>"; 

    } 

} 

?>