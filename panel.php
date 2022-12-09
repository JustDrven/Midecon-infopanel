<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIdecon.eu | InfoPanel</title>
</head>
<body>
    <?php session_start();


    
        echo "<img src=\"https://visage.surgeplay.com/bust/96/". $_SESSION["BungeeUUID"] ."\" alt=\"Logo\"> <br />";
        echo $_SESSION["BungeeName"]. "<br />";
        echo "Rank: ". $_SESSION["BungeeRank"];
    

    ?>
</body>
</html>