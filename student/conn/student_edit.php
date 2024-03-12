<?php
include '../inc/header.php';
// header tags toevoegen
echo '<header class="head">';

echo '</header>'; //afsluiten header
// voor gridopmaak alvast de main-content
echo '<main class="main-content">';
// FORM EDIT Student...
echo '<div id="frmDetail">';
if (isset($_GET["id"])) {
    $studentId=$_GET["id"];
}
else {
    echo 'Student niet gevonden...';
    header('refresh: 1; url=studenten.php');
}
// , tussenvoegsel, achternaam, straat, postcode, woonplaats, email, klas, geboortedatum

$qryStudent = "SELECT id, voornaam, tussenvoegsel, achternaam, straat, postcode, woonplaats, email, klas, geboortedatum
        FROM student
        WHERE id='$studentId'";
//result...
$resultStudent = $dbconn->prepare($qryStudent);
$resultStudent->execute();
$count_row = $resultStudent->rowCount();
if($count_row>1) {
    echo 'Er zijn meerdere Studenten geselecteerd. Dit gaat niet goed!';
    header('refresh: 2; url=studenten.php');
}
//1 record...
$Student=$resultStudent->setFetchmode(PDO::FETCH_ASSOC);
foreach($resultStudent as $row) {
    echo '<div>

    <form action ="dataverwerken.php" method="POST" class="frmDetail">
        <input type="hidden" name="action" value="UpdateStudent">
        <input type="hidden" name="id" value="<?php echo $studentId;?>">
        <label for="fVoornaam">Voornaam:</label>
        <input type="text" name="voornaam" value="'. $row["voornaam"] .'" id="fVoornaam"><br>
        <label for="fStudenttussenvoegsel">Tusselvoegsel:</label>
        <input type="text" name="tussenvoegsel" value="'. $row["tussenvoegsel"] .'" id="fStudenttussenvoegsel"><br>
        <label for="fAchternaam">Achternaam.:</label>
        <input type="text" name="achternaam" value="'. $row["achternaam"] .'" id="fAchternaam"><br>
        <label for="fStraat">Straat:</label>
        <input type="text" name="straat" value="'. $row["straat"] .'" id="fStraat"><br>
        <label for="fPostcode">Postcode:</label>
        <input type="text" name="postcode" value="'. $row["postcode"] .'" id="fPostcode"><br>
        <label for="fWoonplaats">Woonplaats:</label>
        <input type="text" name="woonplaats" value="'. $row["woonplaats"] .'" id="fWoonplaats"><br>
        <label for="fEmail">Email:</label>
        <input type="text" name="email" value="'. $row["email"] .'" id="fEmail"><br>
        <label for="fKlas">Klas:</label>
        <input type="text" name="klas" value="'. $row["klas"] .'" id="fKlas"><br>
        <label for="fGeboortedatum">geboortedatum:</label>
        <input type="text" name="geboortedatum" value="'. $row["geboortedatum"] .'" id="fGeboortedatum"><br>
        <div class="submitbtn">
            <input type="submit" name="submit" value="bewaren..." class="btnDetailSubmit">
        </div>
    </form>
</div>';
};
?>

<?php
echo '</div>'; //frmDetail
echo '</main>'; //main-content
include ("../inc/footer.php");
?>
