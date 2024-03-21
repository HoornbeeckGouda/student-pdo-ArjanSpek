<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studenten</title>
    <link rel="stylesheet" type="text/css" href="../css/inlog.css">
</head>
<body>
    <!--hier maken we het login formulier-->
    <div id="login">
        <h1>Login</h1>
        <form action="authorisatie.php" method="POST" class="frmlogin" >
            <label for="fInlog">Inlognaam:</label><br>
            <input type="text" name="inlognaam" id="fInlog" size="25" placeholder="inlognaam..." class="login-text"><br>
            <label for="fWachtwoord">Wachtwoord:</label><br>
            <input type="password" id="fWachtwoord" name="wachtwoord" size="25" placeholder="wachtwoord..." class="login-text"><br>
            <input type="submit" name="submit" value="login" class="submit"><br><br>
        </form>
        <a href="./wachtvergeten.php" style="padding: 10px; border: 1px solid #000; border-radius: 10px; background-color: #fff; text-decoration: none; color: black;">wachtwoord vergeten</a>
    </div>
</body>
</html>