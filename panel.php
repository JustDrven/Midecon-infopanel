<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/image.css">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/ranks.css">
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

            $rank = [
                    "full" => [
                        "Owner",
                        "Leader",
                        "Developer"
                    ],
                    "helpers" => [
                        "Owner",
                        "Leader",
                        "Developer",
                        "Hl.Helper",
                        "El.Helper",
                        "Helper",
                        "Zk.Helper"
                    ],
                    "builders" => [
                        "Owner",
                        "Leader",
                        "Developer",
                        "Builder",
                        "Hl.Builder",
                        "El.Builder",
                        "Zk.Builder",
                    ]
            ];

            $statuses = [
                "waiting" => [
                    "Čekání na odpověď"
                ],
                "done" => [
                    "Vyřešeno"
                ],
                "waiting-to-player" => [
                    "Čekání na odpověď hráče"
                ]
            ];

        if (in_array($_SESSION["BungeeRank"], $rank["helpers"])) {
            echo "<div class=\"tickets-list\">
                <table class=\"table table-striped\" style=\"width: 40rem;\">
                    <thead>
                        <tr>
                            <th>ID:</th>
                            <th>Player:</th>
                            <th>Reason:</th>
                            <th>Status:</th>
                        </tr>
                    </thead>
                <tbody>";
                        $connected = mysqli_connect("localhost", "root", "", "tickets-list");
                        $result = mysqli_query($connected, "SELECT * FROM `list`");

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>". $row["id"] ."</td>
                            <td>". $row["player"] ."</td>
                            <td>" . $row["reason"] ."</td>";
                            if (in_array($row["status"], $statuses["waiting"])) {
                                echo "<td><button class=\"btn btn-warning\">";
                                print_r($row["status"]);
                                echo "</button></td>";
                            }
                            if (in_array($row["status"], $statuses["done"])) {
                                echo "<td><button class=\"btn btn-success\">";
                                print_r($row["status"]);
                                echo "</button></td>";
                            }
                            if (in_array($row["status"], $statuses["waiting-to-player"])) {
                                echo "<td><button class=\"btn btn-primary\">";
                                print_r($row["status"]);
                                echo "</button></td>";
                            }
    
                        }

                        echo "</tr>
                        </tbody>
                    </table>
                </div>";

                             
            }
                    
            ?>

</body>
</html>