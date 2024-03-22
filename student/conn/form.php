<?php
        $email;$captcha;$gebruikersnaam;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }
        if(isset($_POST['gebruikersnaam'])){
            $gebruikersnaam=$_POST['gebruikersnaam'];
        }
        $query = "SELECT inlognaam FROM gebruiker
            where inlognaam=" . $inlognaam . ";";
        $result=$dbconn->prepare($query);
        $result->execute();
        $aantal = $result->rowCount();
        if ($aantal >= 1){
            echo "gebruiker gevonden";
            exit;
        } else{
            header('refresh: 1, wachtvergeten.php');
        }
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LeBN6ApAAAAAOy5-rObuFMQQpt_afBwG0xnOfZy";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                header('refresh: 1, Testmailen.php');
        } else {
                echo '<h2>spammer! Get the @$%K out</h2>';
        }
?>