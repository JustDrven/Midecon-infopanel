<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/x-icon">
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
            ],
            "vip_active" => [
                "Owner",
                "Leader",
                "Developer",
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

        
        <div class="info">
            <h3 class="center">Základní informace</h3>
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nick:</th>
                        <th>Rank:</th>
                        <th>VIP výhody:</th>
                        <th>Coins:</th>
                        <th>AutoLogin:</th>
                        <th>UUID:</th>
                        <th>Crate:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_SESSION["BungeeName"] ?></td>
                        <td><?php echo $_SESSION["BungeeRank"] ?></td>
                        <td>
                            <?php 
                            
                            if (in_array($_SESSION["BungeeRank"], $rank["vip_active"])) {
                                echo "<button class=\"btn bg-success text-light\">Yes</button>";
                            } else {
                                echo "<button class=\"btn bg-danger text-light\">No</button>";
                            }
                            
                            ?>
                        </td>
                        <td>0</td>
                        
                        <td>
                        <form action="./panel.php" method="post">
                                <input type="submit" value="No" name="submit" class="bg-danger btn text-light p-1">
                            </form>
                            
                            </td>
                        <td><?php echo $_SESSION["BungeeUUID"] ?></td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="stats">
            <h3 class="center">Statistiky</h3>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>MiniGame</th>
                    <th>Kills</th>
                    <th>Deaths</th>
                    <th>Wins</th>
                    <th>Loses</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>LuckyWars</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                </tr>
                    <tr>
                    <td>GetDown</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                </tr>
                    <tr>
                    <td>Cores</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                </tr>
                    <tr>
                    <td>GoldRush</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


        <?php


        if (in_array($_SESSION["BungeeRank"], $rank["helpers"])) {
            echo "<div class=\"tickets-list\">
                <table class=\"table table-striped table-bordered table-hover\">
                    <thead class=\"table-dark\">
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