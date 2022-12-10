<?php

session_start();



$conn = mysqli_connect("localhost", "root", "", "mideconinfopanel");

if(isset($_POST["submit"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);

    if (empty($pass) || empty($user) ) {

        $_GET["error"] = "empty";

        header("Location: index.php?error=empty");
    } else {

        $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `name`='$user'");

        while($row = mysqli_fetch_array($result)) {
            $_SESSION["BungeeRank"] = $row["rank"];
            $_SESSION["BungeeUUID"] = $row["uuid"];
            $_SESSION["BungeeName"] = $row["name"];
            $_SESSION["BungeeAutoLogin"] = false;
        }

        header("Location: panel.php"); 
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; url=http://localhost/panelMidecon/index.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midecon.eu | Security</title>
</head>
<body>
    
</body>
</html>