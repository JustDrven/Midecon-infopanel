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
        ?>
    </div>

</body>
</html>