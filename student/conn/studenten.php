<?php
include '../inc/header.php';


// initialiseren/declareren
$contentTable = "";
//tabelkop samenstellen
$table_header = '<table id="students">
                    <tr>
                        <th>studentnr</th>
                        <th>voornaam</th>
                        <th>tussenvoegsel</th>
                        <th>achternaam</th>
                        <th>straat</th>
                        <th>postcode</th>
                        <th>woonplaats</th>
                        <th>email</th>
                        <th>klas</th>
                        <th>geboortedatum</th>
                        <th>edit</th>
                    </tr>';
$qry_student = "SELECT 
                        id, 
                        voornaam, 
                        tussenvoegsel, 
                        achternaam,
                        straat,
                        postcode,
                        woonplaats,
                        email,
                        klas,
                        geboortedatum
                        FROM student
                        ORDER BY achternaam, voornaam;";
// gegevens query ophalen uit db student
$result=$dbconn->prepare($qry_student);
$result->execute();
$count_records = $result->rowCount();
if ($count_records>0) { // wel studenten ophalen
    while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
        foreach ($rows as $row) {
        $contentTable .= "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['voornaam'] . "</td>
                            <td>" . $row['tussenvoegsel'] . "</td>
                            <td>" . $row['achternaam'] . "</td>
                            <td>" . $row['straat'] . "</td>
                            <td>" . $row['postcode'] . "</td>
                            <td>" . $row['woonplaats'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['klas'] . "</td>
                            <td>" . $row['geboortedatum'] . "</td>
                            <td></td>
                        </tr>";
        }
    }
}
$table_student = $table_header . $contentTable . "</table>";

echo $table_student;


include '../inc/Footer.php';
?>