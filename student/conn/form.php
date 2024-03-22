<?php
        include '../db/database.php';
        $email='';$captcha='';$gebruikersnaam='';$wachtwoord='';
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }
        if(isset($_POST['gebruikersnaam'])){
            $gebruikersnaam=$_POST['gebruikersnaam'];
        }
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        $query = "SELECT inlognaam, wachtwoord FROM gebruiker WHERE inlognaam ='" . $wachtwoord . "';";
        $result = $dbconn->prepare($query);
        $result->bindparam('wachtwoord', $wachtwoord, PDO::PARAM_STR);
        $result->bindParam(':gebruikersnaam', $gebruikersnaam);
        echo $wachtwoord;
        $result->execute();
        echo $wachtwoord;
        $aantal = $result->rowCount();
        if ($aantal >= 1){
            echo "gebruiker gevonden";
            exit;
        } else{
            header('refresh: 1, wachtvergeten.php');
        }
        if(!isset($captcha)){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LeBN6ApAAAAAOy5-rObuFMQQpt_afBwG0xnOfZy";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                header('refresh: 1, Testmailen.php');
        } else {
                echo '<h2>spammer! Get the @$%K out</h2>';
                header('refresh: 1, index.html');
        }
?>


<!-- Warning: Undefined variable $captcha in C:\xampp\htdocs\student-pdo-ArjanSpek\student\conn\form.php on line 23
Please check the the captcha form. 

