<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/inlog.css">
</head>
<body>
    <!--hier maken we het login formulier-->
    <main class="main-content">
        <div id="login">
            <div>
                <form action="authorisatie.php" method="POST" class="frmlogin" >
                    <label for="fInlog">Inlognaam:</label><input type="text" name="inlognaam" id="fInlog" size="25" placeholder="inlognaam..."><br>
                    <label for="fWachtwoord">Wachtwoord:</label><input type="password" id="fWachtwoord" name="wachtwoord" size="25" placeholder="wachtwoord..."><br>
                    <input type="submit" name="submit" value="login"><br>
                </form>
            </div>
        </div>
    </main>    
</body>
</html>