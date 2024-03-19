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
    public function query($Id){
        $qry = "SELECT id, voornaam, tussenvoegsel, achternaam, straat, postcode, woonplaats, email, klas, geboortedatum
        FROM Student
        WHERE id='$Id'";
        $result_edit=$this->conn->prepare($qry);
        $result_edit->execute();
        return $result_edit;
    }
    public function updateStudentDetail()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : "";
        $tussenvoegsel = isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : "";
        $achternaam = isset($_POST['achternaam']) ? $_POST['achternaam'] : "";
        $straat = isset($_POST['straat']) ? $_POST['straat'] : "";
        $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : "";
        $woonplaats = isset($_POST['woonplaats']) ? $_POST['woonplaats'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $klas = isset($_POST['klas']) ? $_POST['klas'] : "";
        $geboortedatum = isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : "";

        // Prepare the SQL query with placeholders
        $qryUpdateProduct = "UPDATE student SET 
                                voornaam = :voornaam, 
                                tussenvoegsel = :tussenvoegsel, 
                                achternaam = :achternaam, 
                                straat = :straat, 
                                postcode = :postcode, 
                                woonplaats = :woonplaats, 
                                email = :email, 
                                klas = :klas, 
                                geboortedatum = :geboortedatum 
                            WHERE id = :id";

        // Prepare the statement
        $update = $this->conn->prepare($qryUpdateProduct);

        // Bind parameters
        $update->bindParam(':id', $id);
        $update->bindParam(':voornaam', $voornaam);
        $update->bindParam(':tussenvoegsel', $tussenvoegsel);
        $update->bindParam(':achternaam', $achternaam);
        $update->bindParam(':straat', $straat);
        $update->bindParam(':postcode', $postcode);
        $update->bindParam(':woonplaats', $woonplaats);
        $update->bindParam(':email', $email);
        $update->bindParam(':klas', $klas);
        $update->bindParam(':geboortedatum', $geboortedatum);

        // Execute the statement
        $update->execute(); 
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
