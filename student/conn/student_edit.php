<?php
include '../inc/header.php';
require_once '../classes/Student.php';

if (isset($_GET["id"])) {
    $Id=$_GET["id"];
}
else {
    echo 'Student niet gevonden...';
    header('refresh: 1; url=studenten.php');
}
$oStudent = new Student($dbconn);
$result = $oStudent->displayStudent($Id);
echo $result;



include ("../inc/footer.php");
?>
