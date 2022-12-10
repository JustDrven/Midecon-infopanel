<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/image.css">
    <link rel="stylesheet" href="./src/css/ranks.css">
    <link rel="stylesheet" href="./src/css/main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIdecon.eu | InfoPanel</title>
</head>
<body>
    <div>
        <?php session_start();

            if (isset($_SESSION["BungeeUUID"])) {

                echo "<nav class='navigation'>";
                echo "<div class='logo'>";
                echo "<img src='./src/images/logo.png' alt='Logo'>";
                echo "</div>";
                echo "<div class='card-infopanel'>";
                echo "<img src=\"https://visage.surgeplay.com/bust/96/". $_SESSION["BungeeUUID"] ."\" alt=\"Logo\">";
                echo "<div class='card-infopanel-text'>";
                echo "<p>".$_SESSION["BungeeName"]. "</p>";
                echo "<p class=" . $_SESSION["BungeeRank"] . ">". $_SESSION["BungeeRank"], "</p>";
                echo "</div>";
                echo "</div>";
                echo "</nav>";
            } else {
                header("Location: index.php?error=NOLogged");
            }
        ?>
    </div>
    <?php 
    
    if ($_SESSION["BungeeRank"] == "Majitel") {
        echo "    <div class=\"tickets-list\">
        <table class=\"table table-striped\" style=\"width: 40rem;\">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Player:</th>
                    <th>Reason:</th>
                    <th>Status:</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <td>1</td>
                    <td>Test</td>
                    <td>Povolit VPN</td>
                    <td><button class=\"btn btn-warning\">Čekání na odpoveď ATeamu</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Test323</td>
                    <td>Povolit VPN</td>
                    <td><button class=\"btn btn-warning\">Čekání na odpoveď ATeamu</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Test4345</td>
                    <td>Povolit VPN</td>
                    <td><button class=\"btn btn-warning\">Čekání na odpoveď ATeamu</button></td>
                </tr>
            </tbody>
        </table>
    </div>";
    } else {
        return;
    }
    
    ?>


</body>
</html>