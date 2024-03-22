<!DOCTYPE html> 

<html lang="en"> 

<head> 

    <meta charset="UTF-8"> 

    <title>Testen mailen...</title> 

</head> 

<body> 

<?php 

//include ('registreren.html'); 

include 'form.php';

include ('./phpmailer.php'); 

include('../db/database.php'); 

$klant = 'jemoeder'; 

$melding='Testmail'; 

echo '<div id="melding">'.$melding."</div>"; 

$onderwerp = "Testmail vanuit phpMailer"; 

$bericht = "Geachte $klant, hierbij uw inloggegevens.
            $gebruikersnaam + $wachtwoord"; 

//mailen... 

mailen($email, $klant, $onderwerp, $bericht ); 

?> 

</body> 

</html> 