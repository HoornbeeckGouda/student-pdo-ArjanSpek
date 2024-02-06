<?php

include '../inc/header.php';

//database checken of inlognaam en wachtwoord overeenkomen
if ($_POST=['submit']) {
    $inlognaam=isset($_POST['inlognaam']) ? $_POST['inlognaam'] : '';
    $wachtwoord=isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : '';
}else {
    header('refresh: 1, index.php');
}
$query = "SELECT inlognaam, wachtwoord FROM gebruiker
            where inlognaam='{$inlognaam}' and wachtwoord='{$wachtwoord}';";
//query uitvoeren
$result=$dbconn->prepare($query);
$result->execute();
$aantal = $result->rowCount();
if ($aantal == 1){
    header('refresh: 1, studenten.php');
} else{
    header('refresh: 1, index.php');
}

include '../inc/footer.php'

?>