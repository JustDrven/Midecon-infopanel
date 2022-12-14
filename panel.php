<?php include("./classes/config.class.php");

    $config = new config();

?>

<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/image.css">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="./src/css/ranks.css">
    <link rel="stylesheet" href="./src/css/btn.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midecon.eu | InfoPanel</title>
    <!-- 

          Midecon.eu     
        @author: Drven

     -->
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

        $rank["helpers"] = array_merge($rank["full"], $rank["helpers"]);
        $rank["builders"] = array_merge($rank["full"], $rank["builders"]);
        $rank["vip_active"] = array_merge($rank["full"], $rank["vip_active"]);


            if (isset($_SESSION["BungeeUUID"])) {

                echo "<nav class='navigation'>";
                echo "  <div class='logo'>";
                echo "      <img src='./src/images/logo.png' alt='Logo'>";
                echo "  </div>";
                echo "  <div class='card-infopanel'>";
                echo "      <img src=\"https://visage.surgeplay.com/bust/96/". $_SESSION["BungeeUUID"] ."\" alt=\"Logo\">";
                echo "      <div class='card-infopanel-text'>";
                echo "          <p>".$_SESSION["BungeeName"]. "</p>";
                echo "          <p class=" . $_SESSION["BungeeRank"] . ">". $_SESSION["BungeeRank"], "</p>";
                echo "      </div>";
                echo "  </div>";
                echo "</nav>";
            } else {
                header("Location: index.php?error=NOLogged");
            }
        ?>

        
        <div class="info">
            <h3 class="center">Account's information</h3>
            <br>
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nick:</th>
                        <th>Rank:</th>
                        <th>VIP benefits:</th>
                        <th>Coins:</th>
                        <th>AutoLogin:</th>
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
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="stats">
            <h3 class="center">Stats</h3>
            <br>
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
            echo "  <h3 class=\"center\">Administration</h3>";
            echo "  <br>";
            echo "<div class=\"administrace\">";
            echo "    <a href=\"./tickets/ticket.php\">
            <button>
                Tickets
            </button>
        </a><br>
            <button>BanList</button><br>
            <button>Reports</button>";
            echo "</div>";
        }
    
    ?>





</body>
</html>