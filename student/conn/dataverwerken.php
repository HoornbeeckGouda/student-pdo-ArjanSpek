<?php
include '../inc/header.php';
include '../classes/Student.php';

$oStudent = new Student($dbconn);
$update = $oStudent->updateStudentDetail();
header('refresh: 5; url=studenten.php');