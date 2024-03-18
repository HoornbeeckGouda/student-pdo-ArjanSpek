<?php
class Student
{
    private $conn;
    private $table_name = "student";
    public $qry;
    public $id;
    public $result_edit;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllStudents($orderbyField, $ascDesc)
    {
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
                        FROM " . $this->table_name . "
                        ORDER BY " . $orderbyField . " " . $ascDesc . ";";

        $stmt = $this->conn->prepare($qry_student);
        $stmt->execute();
        return $stmt;
    }

    public function studentTable()
    {
        $result = $this->getAllstudents('achternaam', 'asc');
        $contentTable = "";
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
                                        <td>
                                        <a href='student_edit.php?id={$row['id']}' class='btn-edit'><i class='material-icons md-24'>edit</i></a>
                                        </td>
                                    </tr>";
            }
        }
        $table_student = $table_header . $contentTable . "</table>";
        return $table_student;
    }
    public function displayStudent($Id) {
        $qry = "SELECT id, voornaam, tussenvoegsel, achternaam, straat, postcode, woonplaats, email, klas, geboortedatum
        FROM Student
        WHERE id='$Id'";
        $result_edit=$this->conn->prepare($qry);
        $result_edit->execute();
        $edittable='';
        while ($rows = $result_edit->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($rows as $row) {
                $edittable .= "<tr>
                                        <td>" . $row['id'] . "</td><br>
                                        <td>" . $row['voornaam'] . "" . "</td><br>
                                        <td>" . $row['tussenvoegsel'] . "</td><br>
                                        <td>" . $row['achternaam'] . "</td><br>
                                        <td>" . $row['straat'] . "</td><br>
                                        <td>" . $row['postcode'] . "</td><br>
                                        <td>" . $row['woonplaats'] . "</td><br>
                                        <td>" . $row['email'] . "</td><br>
                                        <td>" . $row['klas'] . "</td><br>
                                        <td>" . $row['geboortedatum'] . "</td><br>
                                    </tr>";
            }
        }
        $table_editstudent = $edittable . "</table>";
        return $table_editstudent;
    }
}




// // initialiseren/declareren
// $contentTable = "";
// //tabelkop samenstellen
// $table_header = '<table id="students">
//                 <tr>
//                     <th>studentnr</th>
//                     <th>voornaam</th>
//                     <th>tussenvoegsel</th>
//                     <th>achternaam</th>
//                     <th>straat</th>
//                     <th>postcode</th>
//                     <th>woonplaats</th>
//                     <th>email</th>
//                     <th>klas</th>
//                     <th>geboortedatum</th>
//                     <th>edit</th>
//                 </tr>';
// $qry_student = "SELECT 
//                     id, 
//                     voornaam, 
//                     tussenvoegsel, 
//                     achternaam,
//                     straat,
//                     postcode,
//                     woonplaats,
//                     email,
//                     klas,
//                     geboortedatum
//                     FROM student
//                     ORDER BY achternaam, voornaam;";
// // gegevens query ophalen uit db student
// $result=$dbconn->prepare($qry_student);
// $result->execute();
// $count_records = $result->rowCount();
// if ($count_records>0) { // wel studenten ophalen
// while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
//     foreach ($rows as $row) {
//     $contentTable .= "<tr>
//                         <td>" . $row['id'] . "</td>
//                         <td>" . $row['voornaam'] . "</td>
//                         <td>" . $row['tussenvoegsel'] . "</td>
//                         <td>" . $row['achternaam'] . "</td>
//                         <td>" . $row['straat'] . "</td>
//                         <td>" . $row['postcode'] . "</td>
//                         <td>" . $row['woonplaats'] . "</td>
//                         <td>" . $row['email'] . "</td>
//                         <td>" . $row['klas'] . "</td>
//                         <td>" . $row['geboortedatum'] . "</td>
//                         <td></td>
//                     </tr>";
//     }
// }
// }
// $table_student = $table_header . $contentTable . "</table>";

// echo $table_student;


include '../inc/Footer.php';
