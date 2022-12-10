<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./src/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midecon.eu | Login</title>
</head>
<body>

    <?php

        $_GET["error"] = "null";

        if ($_GET["error"] == "empty") {
            echo "<div class=\"error\">
            <p>Je nám líto, ale musíš vyplnit udaje</p>
        </div>
        <div class=\"card\">
            <div class=\"login\">
                <img src=\"./src/images/logo.png\" alt=\"Logo Midecon\">
                <form action=\"./util.php\" method=\"post\">
                    <input type=\"text\" name=\"user\" placeholder=\"Herní jméno\"> <br>
                    <input type=\"password\" name=\"pass\" placeholder=\"Herní heslo\"> <br>
                    <input type=\"submit\" name=\"submit\" value=\"Přihlásit se\">
                </form>
            </div>
        </div>";
        } else {
            echo "<div class=\"card\">
            <div class=\"login\">
                <img src=\"./src/images/logo.png\" alt=\"Logo Midecon\">
                <form action=\"./util.php\" method=\"post\">
                    <input type=\"text\" name=\"user\" placeholder=\"Herní jméno\"> <br>
                    <input type=\"password\" name=\"pass\" placeholder=\"Herní heslo\"> <br>
                    <input type=\"submit\" name=\"submit\" value=\"Přihlásit se\">
                </form>
            </div>
        </div>";
        }
    ?>


</body>
</html>