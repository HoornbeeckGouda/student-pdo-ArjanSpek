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
    header('refresh: 2; url=studenten.php');
}

$qryStudent = "SELECT id, voornaam, tussenvoegsel, achternaam, straat, postcode, woonplaats, email, klas, geboortedatum
        FROM student
        WHERE id={$studentId}";
//result...
$resultStudent = mysqli_query($dbconn, $qryStudent);
if(!mysqli_num_rows($resultStudent)==1) {
    echo 'Er zijn meerdere Studenten geselecteerd. Dit gaat niet goed!';
    header('refresh: 2; url=studenten.php');
}
//1 record...
$Student=mysqli_fetch_assoc($resultStudent);
?>
<div>
    <form action ="dataverwerken.php" method="POST" class="frmDetail">
        <input type="hidden" name="action" value="UpdateStudent">
        <input type="hidden" name="id" value="<?php echo $studentId;?>">
        <label for="fStudentnr">Voornaam:</label>
        <input type="text" name="voornaam" value="<?php echo $Student["voornaam"];?>" id="fStudentnr">
        <label for="fStudentomschrijving">Omschrijving:</label>
        <input type="text" name="omschrijving" value="<?php echo $Student["omschrijving"];?>" id="fStudentomschrijving">
        <label for="fLeverancier">Leverancier.:</label>
        <input type="text" name="leverancier" value="<?php echo $Student["leverancier"];?>" id="fLeverancier">
        <label for="fArtikelgroep">Artikelgroep:</label>
        <input type="text" name="artikelgroep" value="<?php echo $Student["artikelgroep"];?>" id="fArtikelgroep">
        <label for="fEenheid">Eenheid:</label>
        <input type="text" name="eenheid" value="<?php echo $Student["eenheid"];?>" id="fEenheid">
        <label for="fPrijs">Prijs:</label>
        <input type="text" name="prijs" value="<?php echo $Student["prijs"];?>" id="fPrijs">
        <label for="fAantal">Aantal:</label>
        <input type="text" name="aantal" value="<?php echo $Student["aantal"];?>" id="fAantal">
        <div class="submitbtn">
            <input type="submit" name="submit" value="bewaren..." class="btnDetailSubmit">
        </div>
    </form>
</div>
<?php
echo '</div>'; //frmDetail
echo '</main>'; //main-content
include ("../inc/footer.php");
?>
