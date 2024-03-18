<?php
include '../inc/header.php';
// header tags toevoegen
echo '<header class="head">';
echo '<p>eventueel extra info</p>';
echo '</header>'; //afsluiten header

// voor gridopmaak alvast de main-content
echo '<main class="main-content">';
// Begin FORM
//echo '<div id="frmDetail">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $action = isset($_POST["action"]) ? $_POST["action"] : 'LEEG';
    switch ($action) {
        case "UpdateStudent":
            updateStudentDetail();
            break;
        case "LEEG":
        default:
            echo "geen geldige actie...";
    }
} else {
    header('url=index.php');
}
function updateStudentDetail()
{
    global $dbconn;
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $voornaam = isset($_POST['voornaam']) ? addslashes($_POST['voornaam']) : "";
    $tussenvoegsel = isset($_POST['tussenvoegsel']) ? addslashes($_POST['tussenvoegsel']) : "";
    $achternaam = isset($_POST['achternaam']) ? addslashes($_POST['achternaam']) : "";
    $straat = isset($_POST['straat']) ? $_POST['straat'] : "";
    $postcode = isset($_POST['postcode']) ? $_POST[''] : "";
    $woonplaats = isset($_POST['prijs']) ? addslashes($_POST['prijs']) : "";
    $email = isset($_POST['prijs']) ? addslashes($_POST['prijs']) : "";
    $klas = isset($_POST['aantal']) ? $_POST['aantal'] : "";
    $email = isset($_POST['prijs']) ? addslashes($_POST['prijs']) : "";
    $qryUpdateStudent = "update Student
                set artikelnummer='{$artikelnr}', omschrijving='{$omschrijving}', leverancier='{$leverancier}', artikelgroep='{$artikelgroep}', eenheid='{$eenheid}', 
                    prijs='{$prijs}', aantal={$aantal} 
                    where id={$id}";

    if (mysqli_query($dbconn, $qryUpdateStudent)) {
        echo "<p>Student {$omschrijving} ({$artikelnr}) is aangepast</p><br>";
        header('refresh: 1; url=voorraad.php');
        exit();
    } else {
        echo "<p>Student {$omschrijving} ({$artikelnr}) is NIET aangepast</p><br>
                $qryUpdateStudent<br>";
        header('refresh: 4; url=voorraad.php');
        exit();
    }

}

?>

<?php
//echo '</div>'; //frmDetail afsluiten
echo '</main>'; //main afsluiten 
include("../inc/footer.php");
?>