<?php

include '../inc/header.php';

//database checken of inlognaam en wachtwoord overeenkomen
if ($_POST=['submit']) {
    $inlognaam=isset($_POST['inlognaam']) ? $_POST['inlognaam'] : '';
    $wachtwoord=isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : '';
}else {
    header('refresh: 1, index.php');
}
$query = "SELECT naam, wachtwoord FROM gebruiker
            where inlognaam='" . $inlognaam . "' and wachtwoord='" . $wachtwoord . "';";
//query uitvoeren
$result = mysqli_query($dbconn, $query);
$aantal = mysqli_num_rows($result);
if ($aantal == 1){
    header('refresh: 1, studenten.php');
} else{
    header('refresh: 1, index.php');
}

?>