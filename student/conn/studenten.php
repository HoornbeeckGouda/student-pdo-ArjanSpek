<?php
include '../inc/header.php';
require_once '../classes/Student.php';

$oStudent = new Student($dbconn);
$result = $oStudent->studentTable('achternaam', 'asc');
echo $result;

include '../inc/Footer.php';
