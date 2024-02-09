<?php

include '../inc/header.php';

//database checken of inlognaam en wachtwoord overeenkomen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inlognaam=isset($_POST['inlognaam']) ? $_POST['inlognaam'] : '';
    $wachtwoord=isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : '';
}else {
    header('refresh: 1, index.php');
}
$query = "SELECT inlognaam, wachtwoord FROM gebruiker
            where inlognaam=:username and wachtwoord=:wachtwoord;";
//query uitvoeren
$result=$dbconn->prepare($query);
$result->bindParam(':username',$inlognaam);
$result->bindParam(':wachtwoord',$wachtwoord);
$aantal = $result->rowCount();
echo $aantal . PHP_EOL;
echo $result;
if ($aantal >= 1){
    header('refresh: 1, studenten.php');
} else{
    header('refresh: 1, index.php');
}

include '../inc/footer.php'

?>