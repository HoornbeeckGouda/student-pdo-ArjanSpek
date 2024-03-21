<?php
include '../inc/header.php';
require_once '../classes/Student.php';

$oStudent = new Student($dbconn);
$result = $oStudent->studentTable('achternaam', 'asc');
echo $result;
?>
<a href="./Testmailen.php">mailen</a>
<?php
include '../inc/Footer.php';
