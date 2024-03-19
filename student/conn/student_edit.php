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
?>
<div style=" width:50%;">
<?php
$oStudent = new Student($dbconn);
$result = $oStudent->displayStudent($Id);
echo $result;
?>
</div>
<div style=" width: 50%; float: left;">
<form action ="Student.php" method="POST" class="frmDetail">
        <input type="hidden" name="action" value="UpdateStudent">
        <input type="hidden" name="id" value="<?php echo $Id;?>">
        <label for="fVoornaam">Voornaam:</label>
        <input type="text" name="voornaam" value="<?php echo $student["voornaam"];?>" id="fVoornaam"><br>
        <label for="fTussenvoegsel">Tussenvoegsel:</label>
        <input type="text" name="tussenvoegsel" value="<?php echo $student["tussenvoegsel"];?>" id="fTussenvoegsel"><br>
        <label for="fAchternaam">Achternaam.:</label>
        <input type="text" name="achternaam" value="<?php echo $student["achternaam"];?>" id="fAchternaam"><br>
        <label for="fStraat">Straat:</label>
        <input type="text" name="straat" value="<?php echo $student["straat"];?>" id="fStraat"><br>
        <label for="fPostcode">Postcode:</label>
        <input type="text" name="postcode" value="<?php echo $student["posode"];?>" id="fPostcode"><br>
        <label for="fWoonplaats">Woonplaats:</label>
        <input type="text" name="woonplaats" value="<?php echo $student["woonplaats"];?>" id="fWoonplaats"><br>
        <label for="fEmail">email:</label>
        <input type="text" name="email" value="<?php echo $student["email"];?>" id="fEmail"><br>
        <label for="fKlas">Klas:</label>
        <input type="text" name="klas" value="<?php echo $student["klas"];?>" id="fKlas"><br>
        <label for="fGeboortedatum">Geboortedatum:</label>
        <input type="text" name="geboortedatum" value="<?php echo $student["geboortedatum"];?>" id="fGeboortedatum"><br>
        <div class="submitbtn">
            <input type="submit" name="submit" value="bewaren..." class="btnDetailSubmit">
        </div>
    </form>
</div>
<?php
include ("../inc/footer.php");
?>
