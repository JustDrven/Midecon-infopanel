<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/ticket.css">
    <link rel="shortcut icon" href="../src/images/logo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midecon.eu | Tickets</title>
</head>
<body>

    <?php include("../classes/config.class.php");


        session_start();
        $config = new config();



        $ranks = [
            "full" => [
                "Owner",
                "Leader",
                "Developer"
            ],
            "helpers" => [
                "Hl.Helper",
                "El.Helper",
                "Helper",
                "Zk.Helper"
            ],
            "builders" => [
                "Builder",
                "Hl.Builder",
                "El.Builder",
                "Zk.Builder",
            ],
            "vip_active" => [
                "Hl.Helper",
                "El.Helper",
                "Helper",
                "Zk.Helper",
                "Builder",
                "Hl.Builder",
                "El.Builder",
                "Zk.Builder",
                "VIP",
                "King",
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

        $ranks["helpers"] = array_merge($ranks["full"], $ranks["helpers"]);

    ?>

    <?php 
        if (in_array($_SESSION["BungeeRank"], $ranks["helpers"])) {
            $connected = mysqli_connect("localhost", "root", "", "tickets-list");
            $result = mysqli_query($connected, "SELECT * FROM `list`");
            if (isset($_GET["id"])) {
                $next = mysqli_query($connected, "SELECT * FROM `list` WHERE `id`=". $_GET["id"]);
                while ($row = mysqli_fetch_array($next)) {
                    if (in_array($row["status"], $statuses["done"])) {
                        $_SESSION["Request"]["Error"] = ["Tento ticket je vyřešen!"];
                        $config->location("ticket.php?error=done");
                    }
                    if ($row["id"] == $_GET["id"]) {
                        echo "Ticket ID: #".$_GET["id"];
                    } else {
                        echo "Error";
                    }
                    

                }

            } else {
            echo "<div class=\"tickets-list\">
                <table class=\"table table-striped table-bordered table-hover\">
                    <thead class=\"table-dark\">
                        <tr>
                            <th>ID:</th>
                            <th>Player:</th>
                            <th>Reason:</th>
                            <th>Status:</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                <tbody>";
                   

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>". $row["id"] ."</td>
                            <td>". $row["player"] ."</td>
                            <td>" . $row["reason"] ."</td>";
                            if (in_array($row["status"], $statuses["waiting"])) {
                                echo "<td><a href=\"./ticket.php?id=". $row["id"] ."\"><button class=\"btn btn-warning\">";
                                print_r($row["status"]);
                                echo "</button></a></td>";
                            }
                            if (in_array($row["status"], $statuses["done"])) {
                                echo "<td><button class=\"btn btn-success\">";
                                print_r($row["status"]);
                                echo "</button></td>";
                            }
                            if (in_array($row["status"], $statuses["waiting-to-player"])) {
                                echo "<td><a href=\"./ticket.php?id=". $row["id"] ."\"><button class=\"btn btn-primary\">";
                                print_r($row["status"]);
                                echo "</button></a></td>";
                            }
                            echo " <form action=\"delete.php\" method=\"post\">
                            <td><a  name=\"delete\" href=\"./ticket.php?success=delete-ticket\" ><input type=\"submit\" value='". $row["id"] ."' name='". $row["id"] ."' class=\"btn btn-danger\">
                            </a></td>
                            </form>";
    
                        }

                        echo "</tr></tbody></table></div>";
                    }
                    } else {
                        $config->location("../index.php?error=NOLogged&kicked-from=tikets");
                    }
                    
                    
                
        ?>

       


</body>
</html>